<div class="page-content-wrapper" id="overall-div">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content" style="min-height: 992px !important;">
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<a href="/dashboard/index">Home</a>
					<i class="fa fa-circle"></i>
				</li>
				<li>
					<span>Detail</span>
				</li>
			</ul>

		</div>
		<!-- END PAGE BAR -->
		<!-- BEGIN PAGE TITLE-->
		<div class="div-dash-detail">
			<div class="div-message-sent">
				<h4>Timeline</h4>
				<table width="100%" class="dash-table">
                    <tr>
                        <td>
                            <div class="dash-message-div-line">
                                <div class="div-message-date">
                                    <label class="div-message-date-label"><?= $medication['uploaded_date']?></label>
                                </div>
                                <div class="div-message-status">
                                    <label class="div-message-status-label">Task Generated</label>
                                </div>
                            </div>
                        </td>
                    </tr>
					<? if ($medication['status'] != "U"): ?>
						<tr>
							<td>
								<div class="dash-message-div-line">
									<div class="div-message-date">
										<label class="div-message-date-label"><?= $medication['uploaded_date']?></label>
									</div>
									<div class="div-message-status">
										<label class="div-message-status-label">Communication Initiated</label>
									</div>
								</div>
							</td>
						</tr>
					<? endif; ?>
                    <? foreach ($tasks as $key => $value) { ?>
                        <tr>
                            <td>
                                <div class="dash-message-div-line">
                                    <div class="div-message-date">
                                        <label class="div-message-date-label"><?= $value['sent_time']?></label>
                                    </div>
                                    <div class="div-message-status">
                                            <? if($value['message_subject'] == "") { ?>
                                                <label class="div-message-status-label">Sent</label>
                                                <img class="opt-img" src="<?=IMG_DIR ?>/message_icon.png" width=30 style="float: right;"/>
                                            <? } else { ?>
                                                <label class="div-message-status-label">Delivered</label>
                                                <img class="opt-img" src="<?=IMG_DIR ?>/mail_icon.png" width=30 style="float: right;"/>
                                            <? } ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <? } ?>
				</table>
			</div>
			<div class="div-message-content">
				<h4 style="margin-bottom: 10px;">Communication & Actions</h4>
				<div class="portlet-body" style="margin-top: 20px;">
					<div class="panel-group accordion scrollable" id="accordion2">
                        <? foreach ($tasks as $key => $value) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-headding-tab" style="background-color: red; background-image: linear-gradient(lightgrey, #fffffc, white);border-radius: 5px !important;">

                                            <? if($value['message_subject'] == "") { ?>
                                                <img class="opt-img panel-headding-img" src="<?=IMG_DIR ?>/message_icon.png" width=25 />
                                            <? } else { ?>
                                                <img class="opt-img panel-headding-img" src="<?=IMG_DIR ?>/mail_icon.png" width=25 />
                                            <? } ?>

                                        <h4 class="panel-title">
                                            <a class="accordion-toggle header-title" data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_<?=$value['id']; ?>">
                                                <?=$value['sent_time']?> </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_2_<?=$value['id']; ?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div>
                                                <img class="opt-img" src="<?=IMG_DIR ?>/right_back.png" width=15 />
                                                <label class="div-sent-label-title">&nbsp;Sent from: &nbsp;</label>
                                                    <? if($value['message_subject'] == "") { ?>
                                                        <label class="dis-sent-label-content"><?= $value['sender_id']?> </label>
                                                    <? } else { ?>
                                                        <label class="dis-sent-label-content"><?= $value['sender_id']?> </label>
                                                    <? } ?>
                                            </div>
                                            <div style="margin-top: 5px;">
                                                <img class="opt-img" src="<?=IMG_DIR ?>/right_back.png" width=15 />
                                                <label class="div-sent-label-title">&nbsp;Sent to: &nbsp;</label>
                                                    <? if($value['message_subject'] == "") { ?>
                                                        <label class="dis-sent-label-content"><?= $value['sms_sent_to']?> </label>
                                                    <? } else { ?>
                                                        <label class="dis-sent-label-content"><?= $value['email_sent_to']?> </label>
                                                    <? } ?>
                                            </div>
                                            <? if($value['message_subject'] != "") { ?>
                                                <div style="margin-top: 5px;">
                                                    <img class="opt-img" src="<?=IMG_DIR ?>/right_back.png" width=15 />
                                                    <label class="div-sent-label-title">&nbsp;Subject: &nbsp;</label>
                                                    <label class="dis-sent-label-content"><?= $value['message_subject']?> </label>
                                                </div>
                                            <? } ?>
                                            <div style="margin-top: 5px;">
                                                <img class="opt-img" src="<?=IMG_DIR ?>/right_back.png" width=20 />
                                                <label class="div-content-label-title">&nbsp;Content: &nbsp;</label>
                                                <div>
                                                    <span label class="div-content-label-content"><?=$value['message_content']?></span>

                                                </div>
                                            </div>
                                            <div style="margin-top: 5px;">
                                                <img class="opt-img" src="<?=IMG_DIR ?>/right_back.png" width=15 />
                                                <label class="div-sent-label-title">&nbsp;Action(s) Performed: &nbsp;</label>
                                                <div class="div-action">
                                                    <div class="div-action-div"><label class="div-action-div-label"><i class="fa fa-play"></i></label></div>

                                                    <label class="div-action-label">Communication Initiated</label>
                                                </div>
                                                <div class="div-action">
                                                    <div class="div-action-div"><label class="div-action-div-label"><i class="fa fa-play"></i></label></div>

                                                        <? if($value['message_subject'] == NULL) { ?>
                                                            <label class="div-action-label">Delivered</label>
                                                        <? } else { ?>
                                                            <label class="div-action-label">Sent</label>
                                                        <? } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <? } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
