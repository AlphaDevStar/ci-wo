<style>
    .spinner-preview {
        width: 100px;
        height: 100px;
        text-align: center;
    }
</style>

<div class="modal fade" id="spinnerDialog" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px; ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="alertTitle">保存中...</h4>
            </div>
            <div class="modal-body" style="text-align: center;">
                <div style="text-align: center; padding: 20px;">
                    <div class="spinner-preview" id="spinner-preview"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=JS_DIR?>/spin.js"></script>

<script type="text/javascript">
    jQuery(function($) {
        $.fn.spin = function (opts) {
            this.each(function () {
                var $this = $(this),
                    data = $this.data();

                if (data.spinner) {
                    data.spinner.stop();
                    delete data.spinner;
                }
                if (opts !== false) {
                    data.spinner = new Spinner($.extend({color: $this.css('color')}, opts)).spin(this);
                }
            });
            return this;
        };

        function spinner_update() {
            var opts = {};
            opts['lines'] = 11;     // data-min=5,   data-max=16,  data-step=2
            opts['length'] = 0;     // data-min=0,   data-max=30
            opts['width'] = 13;     // data-min=2,   data-max=20
            opts['radius'] = 25;    // data-min=0,   data-max=40
            opts['corners'] = 1;    // data-min=0,   data-max=1,   data-step=0.1
            opts['rotate'] = 0;     // data-min=0,   data-max=90
            opts['trail'] = 60;     // data-min=10,  data-max=100
            opts['speed'] = 1;      // data-min=0.5, data-max=2.2, data-step=0.1
            $('#spinner-preview').spin(opts);
        }

        spinner_update();
    });
</script>