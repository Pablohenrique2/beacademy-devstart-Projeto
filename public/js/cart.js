function cartDeleteProduct(idrequest, idproduct, item) {
    $('#form-delete-product input[name="request_id"]').val(idrequest);
    $('#form-delete-product input[name="product_id"]').val(idproduct);
    $('#form-delete-product input[name="item"]').val(item);
    $("#form-delete-product").submit();
}
function cartAddProduct(idproduct) {
    $('#form-add-product input[name="id"]').val(idproduct);
    $("#form-add-product").submit();
}
