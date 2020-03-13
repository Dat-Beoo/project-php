  <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="tinymce/config.js"></script>
<script src="js/adminlte.min.js"></script>
<!-- <script type="text/javascript" src="js/angular.min.js"></script> -->
<!-- <script type="text/javascript" src="js/app.js"></script> -->
<script type="text/javascript">
  $(document).ready(function(){
    $('input#anh').change(function(){
      var _file = $(this).prop('files');

      if (_file && _file[0]) {
        var _r = new FileReader();
        _r.onload = function(e){
          var _img = e.target.result;
          $('img#show_img').attr('src',_img);
        }

        _r.readAsDataURL(_file[0]);
      }
    }) 

    $('input#anh_khac').change(function(){
      var _file = $(this).prop('files');
      
      if (_file) {
       
        for (var i = 0; i < _file.length; i++) {
          let _r = new FileReader();

          _r.onload = function(e){

            var _img_src = e.target.result;
            var img = document.createElement("img");
                img.className = "col-md-3 thumbnail";
                img.src = _img_src;
                $('#img_list').append(img);

          }

        _r.readAsDataURL(_file[i]);
        }


      }
    })
  });
</script>
</body>
</html>
