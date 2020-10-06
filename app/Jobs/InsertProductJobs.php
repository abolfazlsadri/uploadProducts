<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Category;
use App\Product;

class InsertProductJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    protected $data, $header;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $header)
    {
        $this->data = $data;
        $this->header = $header;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $data = $this->data;
            $header = $this->header;

            $rowT = [];

            //loop over the data
            foreach ($data as $row) {

                $row = explode(',', $row);
                
                if (!Category::find($row[0])) continue;

                $rowT[] = array_combine($header, $row);
            }
            Product::insert($rowT);
        } catch (\Exception $e) {
            print ($e->getMessage());
        }

    }
}
