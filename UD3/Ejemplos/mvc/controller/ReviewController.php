<?php
require MODEL_PATH . "ReviewModel.php";
class ReviewController
{
    public function listarReviews()
    {
        $articulo = $_GET["cod_articulo"] ?? null;
        if (isset($articulo)) {
            $data = ReviewModel::getReviews($articulo);
        } else {
            include_once VIEW_PATH . "error-lista_reviews-view.html";
        }

        if (isset($data)) {
            include_once VIEW_PATH . 'lista_reviews-view.php';
        }

    }
}