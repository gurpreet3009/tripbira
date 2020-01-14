<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="query">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 1px solid #ededed;">
                <h1 class="modal-title" id="exampleModalLabel" style="font-size: 25px;font-weight: bold; margin: 0;color: #031b32;">Have a query..</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" id="query_submit">
                <div class="card-body"> 
                    <div class="row"> 
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required="required">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Email</label>
                                <input type="email" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="required">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Phone No.</label>
                                <input type="tel" class="form-control" name="phone" id="phone" pattern="^\d{10}$" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Destination</label>
                                <input type="text" class="form-control" name="destination" id="destination" required="required">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group bmd-form-group">
                                <label class="label-control">Date</label>
                                <input id="date" class="datepicker form-control" data-date-format="mm/dd/yyyy">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <button type="submit" name="submit" class="main_btn" style="text-decoration: none;">
                                Send <img src="images/next.png">
                            </button>
                            <!--<a href="#" class="main_btn" style="text-decoration: none;">Send <img src="images/next.png"></a>-->
                        </div>
                    </div>
                </div>
            </form>  
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.datepicker').datepicker();

        $('#query_submit').on('submit', function(e){
            e.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var destination = $('#destination').val();
            var newdate = $('#date').val();
            var date = moment(newdate).format('YYYY-MM-DD');
            var recaptcha_response = $('#recaptchaResponse').val();
            console.log('hello');
            $.ajax({
                type : "POST",
                url : 'view/getting_query.php',
                data : {
                    name : name,
                    email : email,
                    phone : phone,
                    destination : destination,
                    date : date,
                    recaptcha_response : recaptcha_response
                }, 
                success : function(){
                    $('#name').val('');
                    $('#email').val('');
                    $('#phone').val('');
                    $('#destination').val('');
                    $('#date').val('');
                    $('#close').click();
                    $('#message').modal('toggle');
                }
            })
        })
    })
</script>