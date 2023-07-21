<?php

namespace App\Jobs;

use App\Models\DeckAttachment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class StoreImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $imagePath;
    protected $imgType;
    protected $imgSubType;
    protected $deckId;

    /**
     * Create a new job instance.
     *
     * @param string $imagePath
     * @param string $imgType
     * @param string $imgSubType
     * @param int $deckId
     */
    public function __construct(string $imagePath, string $imgType, string $imgSubType, int $deckId)
    {
        $this->imagePath = $imagePath;
        $this->imgType = $imgType;
        $this->imgSubType = $imgSubType;
        $this->deckId = $deckId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('AddDeckAttachmentJob is processing...');
        // Recreate the UploadedFile instance using the file path.
        $file = new \Symfony\Component\HttpFoundation\File\UploadedFile(
            storage_path('app/' . $this->imagePath),
            basename($this->imagePath)
        );

        $filePath = 'images/' . time() . '_' . $file->getClientOriginalName();
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $attachment = DeckAttachment::create([
            'image' => $filePath,
            'img_type' => $this->imgType,
            'img_sub_type' => $this->imgSubType,
            'deck_id' => $this->deckId
        ]);
        Log::info('AddDeckAttachmentJob processing completed.');
        // Optionally, you can add further logic here after the attachment is added.
    }
}
