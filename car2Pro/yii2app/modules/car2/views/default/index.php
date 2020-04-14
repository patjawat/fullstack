<style>
/*not necessary*/
/* @import url('https://fonts.googleapis.com/css?family=Nunito:100,300,400,600,700');
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"); */

/* body {
    font-family: Nunito, arial, sans-serif;
} */

.section {
    float: left;
    width: 100%;
    background: #fff;
    padding: 30px 0;
}

.promote {
    border: 1px dashed #ddd;
    display: flex;
    height: 100%;
    justify-content: center;
    flex-direction: column;
    align-items: stretch;
}

.col-md-4 {
    padding: 15px;
}

/*not necessary*/


.profile-card-2 .card-img-block {
    float: left;
    width: 100%;
    height: 150px;
    overflow: hidden;
}

.profile-card-2 .card-body {
    position: relative;
}

.profile-card-2 .profile {
    border-radius: 50%;
    position: absolute;
    top: -42px;
    left: 15%;
    max-width: 75px;
    border: 3px solid rgba(255, 255, 255, 1);
    -webkit-transform: translate(-50%, 0%);
    transform: translate(-50%, 0%);
}

.profile-card-2 h5 {
    font-weight: 600;
    color: #007bff;
}

.profile-card-2 .card-text {
    font-weight: 300;
    font-size: 15px;
}

.profile-card-2 .icon-block {
    float: left;
    width: 100%;
}

.profile-card-2 .icon-block a {
    text-decoration: none;
}

.profile-card-2 i {
    display: inline-block;
    font-size: 16px;
    color: #007bff;
    text-align: center;
    border: 1px solid #007bff;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    margin: 0 5px;
}

.profile-card-2 i:hover {
    background-color: #007bff;
    color: #fff;
}
</style>
<hr>

<div class="car2-default-index">
    <h1><?=$this->context->action->uniqueId?></h1>
    <p>
        This is the view content for action "<?=$this->context->action->id?>".
        The action belongs to the controller "<?=get_class($this->context)?>"
        in the "<?=$this->context->module->id?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?=__FILE__?></code>
    </p>
</div>



<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card profile-card-2 shadow-lg  mb-5 bg-white rounded">
                    <div class="card-img-block">
                        <img class="img-fluid"
                            src="https://images.pexels.com/photos/877695/pexels-photo-877695.jpeg?auto=compress&cs=tinysrgb&h=350"
                            alt="Card image cap" />
                    </div>
                    <div class="card-body pt-5">
                        <!-- <img src="https://randomuser.me/api/portraits/women/81.jpg" alt="profile-image"
                            class="profile" /> -->
                        <h5 class="card-title">Ford Ranger</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text Lorem Ipsum has been the industry's
                            standard dummy text</p>
                        <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i
                                    class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card profile-card-2 shadow-lg  mb-5 bg-white rounded">
                    <div class="card-img-block">
                        <img class="img-fluid"
                            src="https://images.pexels.com/photos/877695/pexels-photo-877695.jpeg?auto=compress&cs=tinysrgb&h=350"
                            alt="Card image cap" />
                    </div>
                    <div class="card-body pt-5">
                        <img src="https://randomuser.me/api/portraits/women/81.jpg" alt="profile-image"
                            class="profile" />
                        <h5 class="card-title">Toyota Hirux Revo</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text Lorem Ipsum has been the industry's
                            standard dummy text</p>
                        <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i
                                    class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card profile-card-2 shadow-lg  mb-5 bg-white rounded">
                    <div class="card-img-block">
                        <img class="img-fluid"
                            src="https://images.pexels.com/photos/877695/pexels-photo-877695.jpeg?auto=compress&cs=tinysrgb&h=350"
                            alt="Card image cap" />
                    </div>
                    <div class="card-body pt-5">
                        <img src="https://randomuser.me/api/portraits/women/81.jpg" alt="profile-image"
                            class="profile" />
                        <h5 class="card-title">Shurvir Mori</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text Lorem Ipsum has been the industry's
                            standard dummy text</p>
                        <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i
                                    class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card profile-card-2 shadow-lg  mb-5 bg-white rounded">
                    <div class="card-img-block">
                        <img class="img-fluid"
                            src="https://images.pexels.com/photos/877695/pexels-photo-877695.jpeg?auto=compress&cs=tinysrgb&h=350"
                            alt="Card image cap" />
                    </div>
                    <div class="card-body pt-5">
                        <img src="https://randomuser.me/api/portraits/women/81.jpg" alt="profile-image"
                            class="profile" />
                        <h5 class="card-title">Shurvir Mori</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text Lorem Ipsum has been the industry's
                            standard dummy text</p>
                        <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i
                                    class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card profile-card-2 shadow-lg  mb-5 bg-white rounded">
                    <div class="card-img-block">
                        <img class="img-fluid"
                            src="https://images.pexels.com/photos/877695/pexels-photo-877695.jpeg?auto=compress&cs=tinysrgb&h=350"
                            alt="Card image cap" />
                    </div>
                    <div class="card-body pt-5">
                        <img src="https://randomuser.me/api/portraits/women/81.jpg" alt="profile-image"
                            class="profile" />
                        <h5 class="card-title">Shurvir Mori</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text Lorem Ipsum has been the industry's
                            standard dummy text</p>
                        <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i
                                    class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card profile-card-2 shadow-lg  mb-5 bg-white rounded">
                    <div class="card-img-block">
                        <img class="img-fluid"
                            src="https://images.pexels.com/photos/877695/pexels-photo-877695.jpeg?auto=compress&cs=tinysrgb&h=350"
                            alt="Card image cap" />
                    </div>
                    <div class="card-body pt-5">
                        <img src="https://randomuser.me/api/portraits/women/81.jpg" alt="profile-image"
                            class="profile" />
                        <h5 class="card-title">Shurvir Mori</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text Lorem Ipsum has been the industry's
                            standard dummy text</p>
                        <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i
                                    class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>