<script src="/backend/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/backend/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/backend/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/backend/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/backend/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/backend/plugins/moment/moment.min.js"></script>
<script src="/backend/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/backend/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.js"></script>
<script type="text/javascript" src="/backend/DataTables/datatables.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/backend/dist/js/pages/dashboard.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/backend/dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<script src="/backend/repeatable/src/js/jq.multiinput.js"></script>
<script>
  CKEDITOR.replace( 'content' );
</script>
<script>
  $(document).ready(function () {
      $('#participants').multiInput({
          json: true,
          input: $('<div class="row inputElement">\n' +
              '<div class="multiinput-title col-xs-12">Thông số <span class="number">1</span></div>\n' +
              '<div class="form-group col-lg-4 col-sm-6 col-xs-12">\n' +
              '<input class="form-control" name="color[]" placeholder="Màu sắc" type="text">\n' +
              '</div>\n' +
              '<div class="form-group col-lg-4 col-sm-6 col-xs-12">\n' +
              '<input class="form-control" name="size[]" placeholder="Size" type="text">\n' +
              '</div>\n' +
              '<div class="form-group col-lg-4 col-sm-6 col-xs-12">\n' +
              '<input class="form-control" name="amount[]" placeholder="Số lượng" type="text">\n' +
              '</div>\n' +
              '</div>\n'),
          limit: 10,
          onElementAdd: function (el, plugin) {
              console.log(plugin.elementCount);
          },
          onElementRemove: function (el, plugin) {
              console.log(plugin.elementCount);
          }
      });
  });
</script>
<script>
  @if(Session::has('success'))
  		toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error'))
  		toastr.error("{{ session('error') }}");
  @endif
</script>
<script type="text/javascript">
  $(document).ready( function () {
    $('.data-table').DataTable();
    
  } );

  $('.data-table').DataTable({
 
    language: {
        processing: "Message khi đang tải dữ liệu",
        search: "Tìm kiếm",
        lengthMenu: "Hiển thị _MENU_ ",
        info: "Bản ghi từ _START_ đến _END_",
        loadingRecords: "",
        infoEmpty:"Không có dữ liệu",
        zeroRecords: "Không có dữ liệu",
        emptyTable: "Không có dữ liệu",
        paginate: {
            first: "Trang đầu",
            previous: "Trang trước",
            next: "Trang sau",
            last: "Trang cuối",
        },
        aria: {
            sortAscending: ": Message khi đang sắp xếp theo column",
            sortDescending: ": Message khi đang sắp xếp theo column",
        }
    },
  });
</script>

<script>
  $(document).ready(function() {
      var dataChart = [];
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          url: "{{route('backend.order.chart')}}",
          type: 'get',
          data: {}
      }).done(function(response) {
      var values = []; 
        for (var i = 0; i < response.data.length; i++) {
          values.push({
            name: response.data[i].new_date,
            y: parseFloat(response.data[i].total)
          },);
        }
        Highcharts.chart('container', {
          chart: {
            type: 'column'
          },
          title: {
            text: 'Doanh thu theo ngày'
          },
          // subtitle: {
          // 	text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
          // },
          accessibility: {
            announceNewData: {
              enabled: true
            }
          },
          xAxis: {
            type: 'category'
          },
          yAxis: {
            title: {
              text: 'VNĐ'
            }

          },
          legend: {
            enabled: false
          },
          plotOptions: {
            series: {
              borderWidth: 0,
              dataLabels: {
                enabled: true,
                format: '{point.y}₫'
              }
            }
          },

          tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}₫<br/>'
          },

          series: [
          {
            name: "Tổng thu:",
            colorByPoint: true,
            data: values

          }
          ],

        });
      
          
      });
      
  });
  // Create the chart


</script>
