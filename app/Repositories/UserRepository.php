<?php

namespace App\Repositories;

use App\Models\Achievement;
use App\Models\Purchase;
use App\Models\Statistics;
use App\Models\SupportTicket;
use App\Models\User;
use App\Repositories\Api\UserApiRepositoryInterface;
use App\Traits\ResponseTrait;
use DateTime;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserRepository implements UserRepositoryInterface
{
    use ResponseTrait;

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function users_list($request)
    {

        $qry = $this->model->select('id', 'name', 'email', 'username', 'picture', 'online_status', 'account_status', 'updated_at','activeAt');

        if (isset($request->status)) {
            if ($request->status == 'active') {
                $qry->where('account_status', 1);
            } elseif ($request->status == 'inactive') {
                $qry->where('account_status', 0);
            }
        }

        if (!empty($_REQUEST['sSearch'])) {
            $search = $_REQUEST['sSearch'];
            //$qry->where(DB::raw("CONCAT('channels.name','webhook_topics.topic_name') LIKE '% $search %'"));
            $qry->where(function ($query) use ($search) {
                $query->orWhere('name', 'ilike', '%' . $search . '%');
                $query->orWhere('email', 'ilike', '%' . $search . '%');
                $query->orWhere('username', 'ilike', '%' . $search . '%');
            });
        }
        if ($_REQUEST['iDisplayStart']) {
            $offset = $_REQUEST['iDisplayStart'];
            $qry->offset($offset);
        }
        if ($_REQUEST['iDisplayLength']) {
            $limit = $_REQUEST['iDisplayLength'];
            $qry->limit($limit);
        }
        if (isset($_REQUEST['iSortCol_0']) && isset($_REQUEST['sSortDir_0'])) {
            $sort_order = $_REQUEST['sSortDir_0'];
            $sort_column_number = $_REQUEST['iSortCol_0'];
            $sort_column = [
                2 => 'online_status', 3 => 'username', 4 => 'account_status'];
            if (!array_key_exists($sort_column_number, $sort_column)) {
                $column = 'id';
                $sort_order = 'ASC';
            } else {
                $column = $sort_column[$sort_column_number];
            }
            $qry->orderBy($column, $sort_order);
        }
        $store_snippets = $qry->get();
        $data = [];

        if (count($store_snippets) > 0) {
            $serial = $_REQUEST['iDisplayStart'];
            foreach ($store_snippets as $row):
                $serial++;
                $obj = new \stdClass;
                $obj->serial_no = $serial;
                $obj->name = $row->name ? ucwords($row->name) : 'Apple User';
                $obj->email = $row->email ?? "email is hidden";
                $obj->picture = $row->picture;
                if($row->activeAt) {
                    $start_date = new DateTime($row->activeAt);
                    $diffInMinutes = $start_date->diff(new DateTime(now()));
                    if (isset($diffInMinutes->i) && ($diffInMinutes->i < 5)) {
                        $obj->online_status = true;
                    } else {
                        $obj->online_status = false;
                    }
                }else{
                    $obj->online_status = false;
                }
                $obj->username = $row->username ?? "appleuser";
                $obj->account_status = $row->account_status;
                $obj->actions = '';
                $obj->id = $row->id;
                $obj->delete_route = route('users.delete', [$row->id]);
                if ($row->account_status == 1) {
                    $obj->disable_route = route('users.disable', [$row->id]);
                    $obj->account_status_name = "Disable";

                } else {
                    $obj->disable_route = route('users.activate', [$row->id]);
                    $obj->account_status_name = "Activate";

                }

                $data[] = $obj;
            endforeach;

        }
        $qry = $this->model->select('name', 'email', 'username', 'picture', 'online_status', 'account_status');

        if (isset($request->status)) {
            if ($request->status == 'active') {
                $qry->where('account_status', 1);
                $count = $qry->count();
            } elseif ($request->status == 'inactive') {
                $qry->where('account_status', 0);
                $count = $qry->count();
            }
        } else {
            $count = $this->model->count();

        }


        if (!empty($_REQUEST['sSearch'])) {
            $search = $_REQUEST['sSearch'];
            $qry->where(function ($query) use ($search) {
                $query->orWhere('name', 'LIKE', '%' . $search . '%');
                $query->orWhere('email', 'LIKE', '%' . $search . '%');
                $query->orWhere('username', 'LIKE', '%' . $search . '%');
            });
        }

        $filtered_count = $qry->count();

        return json_encode(array('data' => $data, 'recordsTotal' => $count, 'recordsFiltered' => $filtered_count));
    }

    public function delete($id): JsonResponse
    {
        try {
            $user = $this->model->find($id);
            if ($user) {
                Achievement::where('user_id', $user->id)->delete();
                SupportTicket::where('user_id', $user->id)->delete();
                Purchase::where('user_id', $user->id)->delete();
                Statistics::where('user_id', $user->id)->delete();
                Statistics::where('user_id', $user->id)->delete();
                $user->tokens()->delete();
                $user->forceDelete();
                return $this->response(true, 'User Deleted Successfully', [], Response::HTTP_OK);
            }
            return $this->response(false, 'User not found', [], Response::HTTP_UNAUTHORIZED);
        } catch (\Exception $exception) {
            return $this->response(false, 'Something went wrong please try again later', [], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function disable($id): JsonResponse
    {
        try {
            $user = $this->model->find($id);
            if ($user) {
                $user->account_status = 0;
                $user->online_status = 0;
                $user->save();
                return $this->response(true, 'User Disabled Successfully', [], Response::HTTP_OK);
            }
            return $this->response(false, 'User not found', [], Response::HTTP_UNAUTHORIZED);
        } catch (\Exception $exception) {
            return $this->response(false, 'Something went wrong please try again later', [], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function activate($id): JsonResponse
    {
        try {
            $user = $this->model->find($id);
            if ($user) {
                $user->account_status = 1;
                $user->save();
                return $this->response(true, 'User Activated Successfully', [], Response::HTTP_OK);
            }
            return $this->response(false, 'User not found', [], Response::HTTP_UNAUTHORIZED);
        } catch (\Exception $exception) {
            return $this->response(false, 'Something went wrong please try again later', [], Response::HTTP_UNAUTHORIZED);
        }
    }
}
