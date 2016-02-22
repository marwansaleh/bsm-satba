<div class="wrapper">
    <?php $this->load->view('components/_top_body'); ?>
    <div class="bottom">
        <div class="container">
            <div class="row">
                <?php $this->load->view('components/_left_sidebar'); ?>
                <div class="col-md-10 content-wrapper" style="min-height: 1300px;">
                    <div class="content">
                        <div class="main-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo isset($page_title) ? "<h2>$page_title</h2>":''; ?>
                                    <?php echo isset($page_subtitle) ? "<em>$page_subtitle</em>":''; ?>
                                </div>
                                <div class="col-lg-6">
                                    <?php if (isset($breadcumb)): ?>
                                    <div class="pull-right">
                                        <?php echo breadcrumb($breadcumb); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="main-content">
                            <?php if ($this->session->flashdata('message')): ?>
                            <?php echo create_alert_box($this->session->flashdata('message'), $this->session->flashdata('message_type')); ?>
                            <?php endif; ?>
                            
                            <?php if (isset($subview)) { $this->load->view($subview); } ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>