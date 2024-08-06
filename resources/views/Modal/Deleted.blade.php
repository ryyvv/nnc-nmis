<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"> 
            <div class="center modal-body" style="padding-bottom:50px; padding-left:50px;padding-right:50px;">
                <div  >
                    <lord-icon 
                        src="https://cdn.lordicon.com/hjbrplwk.json"
                        trigger="loop"
                        colors="primary:#646e78,secondary:#ee6d66,tertiary:#ebe6ef,quaternary:#3a3347"
                        style="width:150px;height:150px">
                    </lord-icon>
                </div>
                <div class="bold" style="font-size: 25px;color:gray">
                    Are you sure?
                </div>
                <div style="padding-top: 10px;padding-bottom: 20px; font-size:15px" >
                   Do you really want to delete these record? This process cannot be undone.
                </div>
                <div>
                    <button type="button" style="margin-right:5px" class="bold btn btn-secondary" data-dismiss="modal">CANCEL</button>
                    <button type="button" class="bold btn btn-danger" style="background-color:#ee6d66!important" onclick="confirmDeleteLGU()">YES</button>
                </div>
            </div>

        </div>
    </div>
</div>