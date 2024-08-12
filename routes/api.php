<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Assets History
    Route::apiResource('assets-histories', 'AssetsHistoryApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Barcode
    Route::apiResource('barcodes', 'BarcodeApiController', ['except' => ['store', 'update', 'destroy']]);

    // Bon
    Route::apiResource('bons', 'BonApiController', ['except' => ['store', 'update']]);
});
