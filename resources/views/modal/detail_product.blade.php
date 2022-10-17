<div class="modal" id="detailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <img src="{{ asset('/images/soklin.jpg') }}" height="150px" width="150px">
                            </div>
                            <div class="col-md-7 text-left">
                                <p>
                                    <span class="text-dark" id="product_name"></span>
                                    <br />
                                    <s id="harga_sebelum_discount"></s><br/>
                                    <span class="text-dark" id="harga_product"></span><br/>
                                    Dimension : <span class="text-dark" id="dimensi"></span><br/>
                                    Price Unit : <span class="text-dark" id="unit"></span>
                                </p>
                                <button class="form-control btn-primary buy">BUY</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
