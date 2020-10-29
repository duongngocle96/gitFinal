<?php
function show_comment($comment ,$args ,$depth){

    if($comment->comment_approved == "1"):

?>
        <li>
            <div class="author-thumb">
                <?php echo get_avatar( $comment, 82); ?>
            </div>
            <div class="right-content">
                <h4><?php comment_author($comment ); ?><span><?php comment_date('M d Y', $comment); ?></span>
                <p> <?php echo nl2br(get_comment_text( $comment)); ?></p>
<!--                    <h6>-->
<!---->
<!--                        <div class="reply">-->
<!--                            --><?php //comment_reply_link( array (
//                                    'add_below'     => 'comment',
//                                    'respond_id'    => 'respond',
//                                    'reply_text'    => __( 'Reply' ),
//                                    /* translators: Comment reply button text. %s: Comment author name. */
//                                    'reply_to_text' => __( 'Reply to %s' ),
//                                    'login_text'    => __( 'Log in to Reply' ),
//                                    'max_depth'     => 0,
//                                    'depth'         => 0,
//                                    'before'        => '',
//                                    'after'         => '',
//                            )); ?>
<!--                        </div>-->
<!---->
<!--                    </h6>-->
            </div>
        </li>
    </br>
<?php
endif;
}
?>
<div class="col-lg-12">
    <div class="sidebar-item comments">
        <div class="sidebar-heading">
            <h2><?php
                comments_number(
                    __('0 comments'),
                    __('1 comment'),
                    __('% comments'),
                );

                ?></h2>
        </div>
        <div class="content">
            <ul>
                <?php
                wp_list_comments( array('callback'=> 'show_comment'));
                ?>

            </ul>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class ="sidebar-item submit-comment"
<!--    form     -->
    <?php
    comment_form( array(

        'fields' => array(
            'author'=>'<div class="row">
                    <div class="col-md-6 col-sm-12">
                        <fieldset>
                            <input name="author" type="text" placeholder="Your name" required="">
                        </fieldset>
                    </div>',
            'email'=>'<div class="col-md-6 col-sm-12">
                        <fieldset>
                            <input name="email" type="text" placeholder="Your email" required="">
                        </fieldset>
                    </div>
                   ',
            'Subject'=>'<div class="col-md-12 col-sm-12">
                        <fieldset>
                            <input name="subject" type="text" id="subject" placeholder="Subject">
                        </fieldset>
                        </div>
                     </div>',
        ),
        'comment_field' => '<fieldset>
                            <textarea name="comment" rows="6" placeholder="Type your comment" required=""></textarea>
                            </fieldset>' ,
        'class_form'=>'content',


        'submit_button'=>'<fieldset>
                            <button type="submit" id="form-submit" class="main-button">Submit</button>
                         </fieldset>',
        'title_reply_before'=>' <div class="sidebar-heading">
                                <h2>',
        'title_reply'=>'Your comment',
        'title_reply_after'=>'</h2></div>',
    ));
    ?>
</div>
</div>


