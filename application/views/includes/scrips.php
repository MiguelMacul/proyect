
  <!-- javascripts -->
  <script  type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery-ui-1.10.4.min.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery-1.8.3.min.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery-ui-1.9.2.custom.min.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery.scrollTo.min.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery.nicescroll.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery-knob/js/jquery.knob.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery.sparkline.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery-easy-pie-chart/jquery.easy-pie-chart.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/owl.carousel.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery.rateit.min.js"')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery.customSelect.min.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/chart-master/Chart.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/scripts.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/sparkline-chart.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/easy-pie-chart.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery-jvectormap-1.2.2.min.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery-jvectormap-world-mill-en.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/xcharts.min.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery.autosize.min.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery.autosize.min.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery.placeholder.min.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/gdp-data.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/morris.min.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/sparklines.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/charts.js')?>"></script>
 <script  type="text/javascript" src="<?=base_url('assets/js/jquery.slimscroll.min.js')?>"></script>

    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>