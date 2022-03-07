<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
   <!-- Modal content-->
   <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">@yield('modaldeleteheader')</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body">
         <p>@yield('modaldeletecontent')</p>
       </div>
       <div class="modal-footer">
      <form id="destroyconfirm" action="" method="POST">@csrf @method('delete') <button type="submit" class="btn btn-danger">Eliminar</button></form>
       </div>
   </div>
 </div>
</div>
