<?php

namespace App\Console\Commands;

use App\Group;
use App\GroupPrice;
use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use DB;


class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products {url} {file_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save products to a json-file and import to db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = $this->argument('url');
        $file = $this->argument('file_name');

        if ($file == null) {
            $this->info("Initializing curl...");
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $this->info("Sending request to: ".$url);
            $response = curl_exec($curl);
            Storage::put($file, $response);
            $this->info("File stored at: ".$file);
        }

        $data = Storage::get('products.json');
        $products = json_decode($data, true);
        $this->info("Retrieving data from: ".$file);

        foreach ($products['products'] as $product) {
            $this->info("Importing/updating products: " . $product['entity_id']);
            $customerProducts = Product::findOrNew($product['entity_id']);
            $customerProducts->fill($product);
            $customerProducts->fill($product['stock_item']);
            $customerProducts->save();

            GroupPrice::where('product_id', '=', $product['entity_id'])->delete();

            foreach ($product['group_prices'] as $price) {
                $price['product_id'] = $product['entity_id'];
                $groupPrice = GroupPrice::create($price);
            }
        }

        $this->info("Products imported");

        foreach ($products['groups'] as $group) {
            $this->info("Importing/updating groups: ".$group['customer_group_id']);
            $groups = Group::findOrNew($group['customer_group_id']);
            $groups->fill($group)->save();
        }

        $this->info("Groups imported");
        $this->info("All data imported");
    }
}
