<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class ProductComposer
{
    private $products;
    //private $ciao;
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $transportEnterprise= \App\Models\TransportEnterprise::find(1);
        $catalog = \App\Models\Catalog::find($transportEnterprise->catalog_id);
        $productList[0] = \App\Models\ProductDescription::where('catalog_id', $catalog->id)->get();
        $productList[1] = config('currency.currency.defaultCurrency');
        $this->products = $productList;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('products', $this->products);
    }
}
