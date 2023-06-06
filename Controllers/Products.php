<?php

namespace Controllers;

use Models\Products as ProductsModel;
use Services\Storage;
use Services\Validator as Validator;

class Products extends BaseController
{
    /**
     * function for displaying form
     *
     * @return void
     */
    public function showCreateForm(): string
    {
        return view('products/edit', [
            'filteredData' => null
        ]);
    }
    /**
     * function for displaying existing data
     *
     * @return void
     */
    public function list(): string
    {
        return view('products/list', [
            'products' => Storage::loadElements('Products')
        ]);
    }

    /**
     * function for processing entered data and later saving it by using model
     *
     * @return void
     */
    public function processData(): string
    {
        $err = Validator::required([], $_POST, 'name', 'description', 'price', 'deliveryDate');
        if(empty($_FILES['productFile'])){
            $err['productFile'] = 'Image of a product was not uploaded!';
        }

        if(empty($err)){
            $err = $this->validateData($err);
        }

        if (!empty($err)) {
            return view('products/edit', [
                'err' => $err,
            ]);
        }

        $productsModes = new ProductsModel();
        $productsModes->setName(htmlspecialchars($_POST['name']));
        $productsModes->setDate(htmlspecialchars($_POST['deliveryDate']));
        $productsModes->setPrice(floatval(htmlspecialchars($_POST['price'])));
        $productsModes->setDescription(htmlspecialchars($_POST['description']));
        $productsModes->setFileType(pathinfo($_FILES['productFile']['name'], PATHINFO_EXTENSION));
        $productsModes->setUuid();
        $productsModes->savingData();
        redirect('/');
    }

    /**
     * function for checking validity of entered arguments
     *
     * @param array $err
     * @return array
     */
    protected function validateData(array $err): array
    {
        $err['name'] = Validator::checkGeneral($_POST['name']);
        $err['description'] = Validator::checkDescription($_POST['description']);
        $err['price'] = Validator::checkPrice(floatval($_POST['price']));
        $err['deliveryDate'] = Validator::checkDate($_POST['deliveryDate']);

        return $this->filterArray($err, "");
    }
}