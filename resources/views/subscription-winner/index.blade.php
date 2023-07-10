@extends('partials.master')
@section('content')
    <main id="main">
        <div class="container">
            <div class="page-title">
                <h1>Users</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="tabset">
                        <li class="active"><a href="#all">All</a></li>
                        <li><a href="#active">Active</a></li>
                        <li><a href="#inactive">Inactive</a></li>
                        <li><a href="#PremiumSubscribers">Premium Subscribers</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab" id="all">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th class="text-left">profile</th>
                                            <th>Online status</th>
                                            <th>gamertag</th>
                                            <th>account Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center text-left">
                                                    <a href="#" class="userImg">
                                                        <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                    </a>
                                                    <div class="description">
                                                        <h6>Apple John</h6>
                                                        <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge text-success">Active</span>
                                            </td>
                                            <td>jaxongriff101</td>
                                            <td>
                                                <span class="text-success">active</span>
                                            </td>
                                            <td class="actions">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                        <i class="far fa-ellipsis-v"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                        <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center text-left">
                                                    <a href="#" class="userImg">
                                                        <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                    </a>
                                                    <div class="description">
                                                        <h6>Apple John</h6>
                                                        <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge text-success">Active</span>
                                            </td>
                                            <td>jaxongriff101</td>
                                            <td>
                                                <span class="text-success">active</span>
                                            </td>
                                            <td class="actions">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                        <i class="far fa-ellipsis-v"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                        <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center text-left">
                                                    <a href="#" class="userImg">
                                                        <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                    </a>
                                                    <div class="description">
                                                        <h6>Apple John</h6>
                                                        <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge text-success">Active</span>
                                            </td>
                                            <td>jaxongriff101</td>
                                            <td>
                                                <span class="text-success">active</span>
                                            </td>
                                            <td class="actions">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                        <i class="far fa-ellipsis-v"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                        <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center text-left">
                                                    <a href="#" class="userImg">
                                                        <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                    </a>
                                                    <div class="description">
                                                        <h6>Apple John</h6>
                                                        <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge text-success">Active</span>
                                            </td>
                                            <td>jaxongriff101</td>
                                            <td>
                                                <span class="text-success">active</span>
                                            </td>
                                            <td class="actions">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                        <i class="far fa-ellipsis-v"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                        <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center text-left">
                                                    <a href="#" class="userImg">
                                                        <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                    </a>
                                                    <div class="description">
                                                        <h6>Apple John</h6>
                                                        <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge text-success">Active</span>
                                            </td>
                                            <td>jaxongriff101</td>
                                            <td>
                                                <span class="text-success">active</span>
                                            </td>
                                            <td class="actions">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                        <i class="far fa-ellipsis-v"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                        <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center text-left">
                                                    <a href="#" class="userImg">
                                                        <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                    </a>
                                                    <div class="description">
                                                        <h6>Apple John</h6>
                                                        <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge text-success">Active</span>
                                            </td>
                                            <td>jaxongriff101</td>
                                            <td>
                                                <span class="text-success">active</span>
                                            </td>
                                            <td class="actions">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                        <i class="far fa-ellipsis-v"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                        <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center text-left">
                                                    <a href="#" class="userImg">
                                                        <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                    </a>
                                                    <div class="description">
                                                        <h6>Apple John</h6>
                                                        <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge text-success">Active</span>
                                            </td>
                                            <td>jaxongriff101</td>
                                            <td>
                                                <span class="text-success">active</span>
                                            </td>
                                            <td class="actions">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                        <i class="far fa-ellipsis-v"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                        <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center text-left">
                                                    <a href="#" class="userImg">
                                                        <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                    </a>
                                                    <div class="description">
                                                        <h6>Apple John</h6>
                                                        <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge text-success">Active</span>
                                            </td>
                                            <td>jaxongriff101</td>
                                            <td>
                                                <span class="text-success">active</span>
                                            </td>
                                            <td class="actions">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                        <i class="far fa-ellipsis-v"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                        <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="active">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th class="text-left">profile</th>
                                        <th>Online status</th>
                                        <th>gamertag</th>
                                        <th>account Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="inactive">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th class="text-left">profile</th>
                                        <th>Online status</th>
                                        <th>gamertag</th>
                                        <th>account Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab" id="PremiumSubscribers">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th class="text-left">profile</th>
                                        <th>Online status</th>
                                        <th>gamertag</th>
                                        <th>account Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center text-left">
                                                <a href="#" class="userImg">
                                                    <img src="https://appscorridor.com/queens-of-ten-admin/images/user1.png" alt="username">
                                                </a>
                                                <div class="description">
                                                    <h6>Apple John</h6>
                                                    <a href="#">bqgxwprts4@privaterelay.appleid.com</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge text-success">Active</span>
                                        </td>
                                        <td>jaxongriff101</td>
                                        <td>
                                            <span class="text-success">active</span>
                                        </td>
                                        <td class="actions">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="far fa-ellipsis-v"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:"><i class="fal fa-ban bg-warning text-white"></i>Disable User</a></li>
                                                    <li><a href="javascript:"><i class="fal fa-trash bg-danger text-white"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@section('challenge-modal')
    @include('partials.select-winner')
@endsection

@section('extra-js')
    <script>
        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            "searching": true,
            "paging": true,
            'bSortable': false,
            "bInfo": true,
            "bSort": false,
            iDisplayLength: 10,
            "lengthChange": true,
            "bDestroy": true,
            dom: '<"topFooter"fB>rt<"bottomFooter"lip>',
            buttons: [
                {
                    extend: 'csv',
                    text: 'Csv',
                },
                {
                    text: 'Select Winner',
                    className: 'btn-dark',
                    attr: {
                        id: 'selectWinnerButton'
                    },
                    action: function () {
                        $('#selectWinner').modal('show');
                    }
                }
            ],
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".imgHorizentalSelect").select2({
                templateResult: formatState,
                minimumResultsForSearch: Infinity, // Disables search
                dropdownCssClass: 'horizental' // Add custom class
            });

            let icons = {
                "SkySuit": "https://admin.queensoften.com/images/Queens_of_ten.png",
            }

            function formatState (state) {
                if (!state.id) { return state.text; }
                console.log(state);
                var $state = $(
                    `
                    <div class="text">
                          ${state.text}
                    </div>
                   <div><img src="${icons[state.text]}" /></div>
                    `
                );
                return $state;
            }
        });


    </script>
@endsection

