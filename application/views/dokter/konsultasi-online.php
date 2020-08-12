<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Konsultasi Online</h1>

    <section class="content">
        <div class="row">
            <div class="col-md-8" id="chatSection">
                <!-- DIRECT CHAT -->
                <div class="box box-warning direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" id="ReciverName_txt"></h3>

                        <div class="box-tools pull-right">
                            <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages" id="content">
                            <!-- /.direct-chat-msg -->
                            <div id="dumppy"></div>
                        </div>
                        <!--/.direct-chat-messages-->

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <!--<form action="#" method="post">-->
                        <div class="input-group">
                            <?php
                            $obj = &get_instance();
                            $obj->load->model('UserModel');
                            $profile_url = $obj->UserModel->PictureUrl();
                            $user = $obj->UserModel->GetUserData();
                            ?>

                            <input type="hidden" id="Sender_Name" name="Sender_Name" value="<?= $user['nama']; ?>">
                            <input type="hidden" id="Sender_ProfilePic" value="<?= $profile_url; ?>">

                            <input type="hidden" id="ReciverId_txt" name="ReciverId_txt">
                            <input type="text" id="message" name="message" placeholder="Type Message ..." class="form-control message">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
                            </span>
                        </div>
                        <!--</form>-->
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!--/.direct-chat -->
            </div>




            <div class="col-md-4">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>

                        <div class="box-tools pull-right">
                            <span class="label label-danger"><?= count($vendorslist); ?> <?= $strsubTitle; ?></span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">

                            <?php if (!empty($vendorslist)) {
                                foreach ($vendorslist as $v) :
                            ?>
                                    <li class="selectVendor" id="<?= $v['id']; ?>" title="<?= $v['nama']; ?>">
                                        <img src="<?= $v['gambar']; ?>" alt="<?= $v['nama']; ?>" title="<?= $v['nama']; ?>">
                                        <a class="users-list-name" href="#"><?= $v['nama']; ?></a>
                                        <!--<span class="users-list-date">Yesterday</span>-->
                                    </li>
                                <?php endforeach; ?>

                            <?php } else { ?>
                                <li>
                                    <a class="users-list-name" href="#">No Vendor's Find...</a>
                                </li>
                            <?php } ?>
                        </ul>
                        <!-- /.users-list -->
                    </div>
                </div>
                <!--/.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="myModalImg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <img id="modalImgs" src="uploads/attachment/21_preview.png" class="img-thumbnail" alt="Cinque Terre">
            </div>

            <!-- Modal footer -->


        </div>
    </div>
</div>
<!-- Modal -->
<script src="<?= base_url('assets/'); ?>chat/chat.js"></script>