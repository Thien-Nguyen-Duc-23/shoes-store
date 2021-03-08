<?php

namespace App\Http\Controllers\Api\V1\Product;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ActionException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Http\Resources\Product\IndexResource;
use App\Models\Shoes;
use Exception;

class Index extends ApiController
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $this->compacts['data']['new_product'] = IndexResource::collection($this->productRepo->getNewProducts(Shoes::NUMBER_LIMIT_PRODUCT));
            $this->compacts['data']['sell_product'] = IndexResource::collection($this->productRepo->getSellProducts(Shoes::NUMBER_LIMIT_PRODUCT));
        } catch (QueryException $e) {
            throw new ActionException('all', JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        } catch (Exception $e) {
            throw new NotFoundException($e->getMessage(), $e->getCode());
        }

        return $this->jsonRender();
    }
}
