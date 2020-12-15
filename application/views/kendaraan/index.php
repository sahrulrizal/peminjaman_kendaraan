<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables <?php echo $title?></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel <?php echo $title?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <button class="btn btn-success" onclick="tambah_kendaraan()"><i class="fas fa-plus"></i> Tambah Kendaraan</button>
              <button class="btn btn-info" onclick="reload_table()"><i class="fa fa-sync"></i> Reload</button><br><br>
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Plat</th>
                      <th>Warna</th>
                      <th>Merk</th>
                      <th>Jenis</th>
                      <th>Status</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>No</th>
                      <th>Nama</th>
                      <th>Plat</th>
                      <th>Warna</th>
                      <th>Merk</th>
                      <th>Jenis</th>
                      <th>Status</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Form <?php echo $title?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        <div class="container">
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_kendaraan"/> 
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col">Nama Kendaraan*</label>
                            <div class="col-sm-12">
                                <input name="namaKendaraan" placeholder="Nama Kendaraan" class="form-control" type="text" id="namaKendaraan" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col">Plat Kendaraan*</label>
                            <div class="col-sm-12">
                                <input name="plat" placeholder="Plat Kendaraan" class="form-control" type="text" id="plat" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col">Warna Kendaraan*</label>
                            <div class="col-sm-12">
                                <input name="warna" placeholder="Warna Kendaraan" class="form-control" type="text" id="warna" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col">Merk Kendaraan*</label>
                            <div class="col-sm-12">
                                <input name="merk" placeholder="Merk Kendaraan" class="form-control" type="text" id="merk" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col">Jenis Kendaraan*</label>
                            <div class="col-sm-12">
                                <input name="jenis" placeholder="Jenis Kendaraan" class="form-control" type="text" id="jenis" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="image-preview">
                            <label class="control-label col">Photo</label>
                            <div class="col-sm-12">
                                (No image)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col" id="label-image">Photo*</label>
                            <div class="col-sm-12">
                                <input type="file" name="iamge" id="image">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

        </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<link href="<?php echo base_url();?>assets/css/sweetalert.css" rel="stylesheet">
<script src="<?php echo base_url('assets/')?>js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url('assets/js/sweetalert.min.js')?>"></script>
<script type="text/javascript">

var save_method;
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, 
        "serverSide": true, 
        "order": [], 

        
        "ajax": {
            "url": "<?php echo site_url('Kendaraan/list_kendaraan')?>",
            "type": "POST"
        },

        
        "columnDefs": [
            { 
                "targets": [ -1 ], 
                "orderable": false, 
            },
            { 
                "targets": [ -2 ],
                "orderable": false,
            },
        ],

    });

});



function tambah_kendaraan()
{
    save_method = 'add';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('#modal_form').modal('show');
    $('.modal-title').text('Form Tambah Kendaraan');

    $('#image-preview').hide(); 

    $('#label-image').text('Image*');
}



function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('Kendaraan/tambah_kendaraan')?>";
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {

                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    swal({
                        type: 'success',
                        title: 'Tambah Kendaraan',
                        text: 'Anda Berhasil Menambah Data'
                      });
                    reload_table();
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Peringatan", "Semua data harus diisi :)", "warning");
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            }
        });
    } else {
        url = "<?php echo site_url('Kendaraan/update_kendaraan')?>";
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {

                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    swal({
                        type: 'success',
                        title: 'Edit Kendaraan',
                        text: 'Anda Berhasil Edit Kendaraan'
                      });
                    reload_table();
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Peringatan", "Semua data harus diisi :)", "warning");
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            }
        });
    }

    // ajax adding data to database

    
}
function delete_kendaraan(id_kendaraan)
{
  swal({
  title: "Apakah Anda yakin?",
  text: "Anda tidak akan dapat memulihkan data ini!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Ya, hapus!",
  cancelButtonText: "Tidak, batal!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    $.ajax({
            url : "<?php echo site_url('Kendaraan/delete_kendaraan')?>/"+id_kendaraan,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                      swal(
                        'Hapus',
                        'Berhasil Terhapus',
                        'success'
                      )
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
  } else {
    swal("Batal", "Data anda aman :)", "error");
  }
});
}

</script>