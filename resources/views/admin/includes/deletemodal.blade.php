<div class="modal fade" id="modal-17" role="dialog" aria-labelledby="modalLabelinfo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white" id="modalLabelinfo">მონაცემის წაშლა</h4>
            </div>
            <form action="{{action('Admin\\'.$class.'Controller@destroy',12)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="delete" name="_method">
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn  btn-danger" >წაშლა</button>
                    <button type="reset" class="btn  btn-default" data-dismiss="modal">დახურვა</button>
                </div>
            </form>
        </div>
    </div>
</div>
