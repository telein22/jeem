<?php

use System\Core\Model;
use System\Helpers\URL;
use System\Responses\View;

/**
 * @var \Application\Models\Language
 */
$lang = Model::get('\Application\Models\Language');


?>
<div class="iq-card-body profile-page p-0">
    <div class="profile-header">
        <div class="cover-container">
            <div class="cover-image" style="background-image:url('<?= $coverUrl; ?>')">
            </div>
            <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                <li>
                    <a href="<?= URL::full('login') ?>" class="follow-btn <?= ($isFollowing ? 'following' : '') ?>">
                        <span class="font-size-14 font-weight-bold"><?= $lang('follow') ?></span>
                        <span class="font-size-14 font-weight-bold"><?= $lang('unfollow') ?></span>
                    </a>
                </li>
                <li><a href="<?= URL::full('/calls/find/' . $user['id']) ?>"><i class="ri-phone-line"></i></a></li>
                <?php if ($enableMessaging && $messagingPrice) : ?>
                    <li><a href="<?= URL::full('login') ?>"><i class="ri-mail-line"></i></a></li>
                <?php endif; ?>
                <li><a href="<?= URL::full('/workshops/find/' . $user['id']) ?>"><i class="ri-slideshow-line"></i></a></li>
            </ul>
        </div>
        <div class="user-detail text-center mb-3">
            <div class="profile-img position-relative d-inline">
                <img src="<?= $avatarUrl; ?>" alt="profile-img" class="avatar-130 img-fluid profile-image" />
            </div>
            <div class="profile-detail">
                <h3 class="">
                    <?= htmlentities($user['name']); ?>
                    <?php if ($user['account_verified']) echo '<i class="fas fa-check-circle color-primary"></i>' ?>
                </h3>
                <?php if ($reviews['avg'] != 0) : ?>
                <ul class="profile-img-gallary justify-content-center  d-flex flex-wrap p-0 m-0">
                    <div class="profile-review-wrapper d-flex">
                        <div class="profile-star-wrapper d-block ">
                            <ul class="inactive">
                                <li><i class="ri-star-line"></i></li>
                                <li><i class="ri-star-line"></i></li>
                                <li><i class="ri-star-line"></i></li>
                                <li><i class="ri-star-line"></i></li>
                                <li><i class="ri-star-line"></i></li>
                            </ul>
                            <ul class="active" style="width: <?= $reviews['percent'] ?>%;">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                            </ul>
                        </div>
                    </div>
                </ul>
                <!-- <div class="text-center">
                    <?= $lang('review_profile_text', array(
                        'avg' => round($reviews['avg'], 1),
                        'total' => $reviews['count']
                    )) ?>
                </div> -->
            <?php else : ?>
                <div class="text-center"><?= $lang('not_yet_rated') ?></div>
            <?php endif; ?>
            </div>
        </div>
        <div class="profile-info p-4 d-flex align-items-center justify-content-between position-relative">
        <div class="social-links">
                <ul class="social-data-block d-flex align-items-center justify-content-center list-inline p-0 m-0">
                    <?php if (!empty($social['snapchat'])) : ?>
                        <li class="text-center pr-3">
                            <a href="<?= $social['snapchat'] ?>" target="_blank"><i class="fab fa-snapchat-ghost"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($social['linkedIn'])) : ?>
                        <li class="text-center pr-3">
                            <a href="<?= $social['linkedIn'] ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($social['insta'])) : ?>
                        <li class="text-center pr-3">
                            <a href="<?= $social['insta'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($social['youtube'])) : ?>
                        <li class="text-center pr-3">
                            <a href="<?= $social['youtube'] ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($social['facebook'])) : ?>
                        <li class="text-center pr-3">
                            <a href="<?= $social['facebook'] ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($social['telegram'])) : ?>
                        <li class="text-center pr-3">
                            <a href="https://www.t.me/<?= $social['telegram'] ?>" target="_blank"><i class="fab fa-telegram"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($social['twitter'])) : ?>
                        <li class="text-center pr-3">
                            <a href="<?= $social['twitter'] ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($social['website'])) : ?>
                        <li class="text-center pr-3">
                            <a href="<?= $social['website'] ?>" target="_blank"><i class="fas fa-globe"></i></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="social-info">
                <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                    <?php if (!$isEntity) : ?>
                    <li class="text-center pl-3">
                        <h6><?= $lang('posts') ?></h6>
                        <a href="<?= URL::full('outer-profile/' . $user['id']) ?>">
                            <p class="mb-0"><?= $feedCount; ?></p>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="text-center pl-3">
                        <h6><?= $lang('followers') ?></h6>
                        <a href="<?= URL::full('outer-profile/' . $user['id'] . '/followers') ?>">
                            <p class="mb-0"><?= $followerCount; ?></p>
                        </a>
                    </li>
                    <li class="text-center pl-3">
                        <h6><?= $lang('following') ?></h6>
                        <a href="<?= URL::full('outer-profile/' . $user['id'] . '/following') ?>">
                            <p class="mb-0"><?= $followCount; ?></p>
                        </a>
                    </li>
                    <?php if ($isEntity) : ?>
                        <li class="text-center pl-3">
                            <h6><?= $lang('associates_profile') ?></h6>
                            <a href="<?= URL::full('outer-profile/' . $user['id'] . '/associates') ?>">
                                <p class="mb-0"><?= $associatesCount; ?></p>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<define footer_js>
    <script>
        function onclickFollow(elm) {
            var entityId = <?= $user['id']; ?>;



            $.ajax({
                url: URLS.toggle_follow,
                data: {
                    id: entityId
                },
                dataType: 'JSON',
                accepts: 'JSON',
                type: 'POST',
                beforeSend: function() {

                },
                success: function(data) {
                    if (data.info !== 'success') {
                        return;
                    }
                },
                complete: function() {
                    // Follow
                    // toggle the follow icon
                    $(elm).toggleClass('following');
                    if (!$(elm).hasClass('following')) {
                        toast('primary', '<?= $lang('success'); ?>', '<?= $lang('unfollow_success'); ?>');
                    } else {
                        toast('primary', '<?= $lang('success'); ?>', '<?= $lang('follow_success'); ?>');
                    }

                }

            });


        }

        $('#background-image-input').on('change', function(e) {
            if (e.target.files.length < 0) return;

            // else filter the images
            var file = e.target.files[0];

            var formData = new FormData();
            formData.append('image', file);

            // var dialog = bootbox.dialog({
            //     message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> <?= $lang('please_wait_cover') ?></p>',
            //     closeButton: false,
            //     centerVertical: true
            // });

            $.ajax({
                url: URLS.profile_upload_cover,
                beforeSend: function() {

                },
                type: 'POST',
                dataType: 'JSON',
                accepts: 'JSON',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.info === 'error') {
                        toast('danger', '<?= $lang('error') ?>', data.payload);
                        return;
                    }

                    $('.cover-image').css('background-image', 'url(' + data.payload + ')');
                    toast('primary', '<?= $lang('success') ?>', '<?= $lang('success_change_cover') ?>');

                    // <?php // echo $onPostComplete 
                        ?>(data);

                    // resetFeed();
                },
                complete: function() {
                    // $form.find('button').text('<?php // echo $lang('submit') 
                                                    ?>')[0].disabled = false;
                    // dialog.modal('hide');
                }
            });
        });

        $('#profile-image-input').on('change', function(e) {
            if (e.target.files.length < 0) return;

            // else filter the images
            var file = e.target.files[0];

            var formData = new FormData();
            formData.append('image', file);

            // var dialog = bootbox.dialog({
            //     message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> <?= $lang('please_wait_cover') ?></p>',
            //     closeButton: false,
            //     centerVertical: true
            // });

            $.ajax({
                url: URLS.profile_upload_avatar,
                beforeSend: function() {

                },
                type: 'POST',
                dataType: 'JSON',
                accepts: 'JSON',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.info === 'error') {
                        toast('danger', '<?= $lang('error') ?>', data.payload);
                        return;
                    }

                    $('.profile-image').attr('src', data.payload);
                    toast('primary', '<?= $lang('success') ?>', '<?= $lang('success_change_avatar') ?>');
                    // <?php // echo $onPostComplete 
                        ?>(data);

                    // resetFeed();
                },
                complete: function() {
                    // $form.find('button').text('<?php // echo $lang('submit') 
                                                    ?>')[0].disabled = false;
                    // dialog.modal('hide');
                }
            });
        });

        $('.change-cover-btn').on('click', function(e) {
            e.preventDefault();
            $('#background-image-input').trigger('click');
        });

        $('.change-avatar-btn').on('click', function(e) {
            e.preventDefault();
            $('#profile-image-input').trigger('click');
        });

        function onClickWorkshop(elm) {
            var $modal = $('#workshop-profile-modal').modal('show');
        }

        function onClickCall(elm) {
            var $modal = $('#call-modal').modal('show');
        }

        function onClickMessage(elm) {
            // alert("Awesome");
            var $modal = $('#message-modal').modal('show');
        }
    </script>
</define>