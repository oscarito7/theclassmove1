<?php

$ftp_server         = '';
$ftp_user           = '';
$ftp_password       = '';
$ftp_port           = '';
$use_ftps           = '';
$use_pasv           = '';
$enable_ftp_ie      = '';
$ftp_server_path    = '';

if(!empty($ftp_settings)){
    $ftp_server = !empty($ftp_settings['ftp_server']) ? $ftp_settings['ftp_server'] : '';
    $ftp_user = !empty($ftp_settings['ftp_user']) ? $ftp_settings['ftp_user'] : '';
    $ftp_password = !empty($ftp_settings['ftp_password']) ? $ftp_settings['ftp_password'] : '';
    $ftp_port = !empty($ftp_settings['ftp_port']) ? $ftp_settings['ftp_port'] : 21;
    $use_ftps = !empty($ftp_settings['use_ftps']) ? $ftp_settings['use_ftps'] : '';
    $use_pasv = !empty($ftp_settings['use_pasv']) ? $ftp_settings['use_pasv'] : '';
    $enable_ftp_ie = !empty($ftp_settings['enable_ftp_ie']) ? $ftp_settings['enable_ftp_ie'] : '';
    $ftp_server_path = !empty($ftp_settings['ftp_server_path']) ? $ftp_settings['ftp_server_path'] : '';				
}
$tab = (isset($_GET['tab']) && !empty($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'coupon');
?>

<div class="woocommerce">
    <?php include_once(dirname(__FILE__) . '/../../views/html-wf-common-header.php'); ?>
    <ul class="subsubsub" style="margin-left: 15px;">
        <li><a href="<?php echo admin_url('admin.php?page=wf_coupon_csv_im_ex') ?>" class=""><?php _e('Export', 'wf_order_import_export'); ?></a> | </li>
        <li><a href="<?php echo admin_url('admin.php?import=coupon_csv') ?>" class="current"><?php _e('Import', 'wf_order_import_export'); ?></a> </li>
    </ul>
    <br/>
    <div class="tool-box ordimpexp-bg-white ordimpexp-p-20p">
        <h3 class="title"><?php _e('Step 1: Import settings', 'wf_order_import_export'); ?></h3>
        <p><?php _e( 'You can import coupons (in CSV format) in to the shop using any of below methods.', 'wf_order_import_export' ); ?></p>
        <?php if ( ! empty( $upload_dir['error'] ) ) : ?>
            <div class="error"><p><?php _e('Before you can upload your import file, you will need to fix the following error:'); ?></p>
            <p><strong><?php echo $upload_dir['error']; ?></strong></p></div>
        <?php else : ?>
            <form enctype="multipart/form-data" id="import-upload-form" method="post" action="<?php echo esc_attr(wp_nonce_url($action, 'import-upload')); ?>">
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th>
                                <label for="upload"><?php _e( 'Method 1: Select a file from your computer' ); ?></label>
                            </th>
                            <td>
                                <input type="file" id="upload" name="import" size="25" />
                                <input type="hidden" name="action" value="save" />
                                <input type="hidden" name="max_file_size" value="<?php echo $bytes; ?>" />
                                <small><?php printf( __('Maximum size: %s' ), $size ); ?></small>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="ftp"><?php _e( 'Method 2: Provide FTP Details:', 'wf_order_import_export' ); ?></label>
                            </th>
                            <td>
                                <table class="form-table">
                                    <tr>
                                        <th>
                                            <label for="enable_ftp_ie"><?php _e( 'Enable FTP import/export', 'wf_order_import_export' ); ?></label>
                                        </th>
                                        <td>
                                            <input type="checkbox" name="enable_ftp_ie" id="enable_ftp_ie" class="checkbox" <?php checked( $enable_ftp_ie, 1 ); ?> />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="ftp_server"><?php _e( 'FTP Server Host/IP', 'wf_order_import_export' ); ?></label>
                                        </th>
                                        <td>
                                            <input type="text" name="ftp_server" id="ftp_server" placeholder="XXX.XXX.XXX.XXX" value="<?php echo $ftp_server; ?>" class="input-text" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="ftp_user"><?php _e( 'FTP User Name', 'wf_order_import_export' ); ?></label>
                                        </th>
                                        <td>
                                            <input type="text" name="ftp_user" id="ftp_user" placeholder="" value="<?php echo $ftp_user; ?>" class="input-text" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="ftp_password"><?php _e( 'FTP Password', 'wf_order_import_export' ); ?></label>
                                        </th>
                                        <td>
                                            <input type="password" name="ftp_password" id="ftp_password" placeholder="" value="<?php echo $ftp_password; ?>" class="input-text" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="ftp_port"><?php _e('FTP Port', 'wf_order_import_export'); ?></label>
                                        </th>
                                        <td>
                                            <input type="text" name="ftp_port" id="ftp_port"  value="<?php echo $ftp_port; ?>" class="input-text" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="ftp_server_path"><?php _e( 'FTP Server File Path', 'wf_order_import_export' ); ?></label>
                                        </th>
                                        <td>
                                            <input type="text" name="ftp_server_path" id="ftp_server_path" placeholder="" value="<?php echo $ftp_server_path; ?>" class="input-text" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="use_ftps"><?php _e( 'Use FTPS', 'wf_order_import_export' ); ?></label>
                                        </th>
                                        <td>
                                            <input type="checkbox" name="use_ftps" id="use_ftps" class="checkbox" <?php checked( $use_ftps, 1 ); ?> />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="use_pasv"><?php _e( 'Enable Passive mode', 'wf_order_import_export' ); ?></label>
                                        </th>
                                        <td>
                                            <input type="checkbox" name="use_pasv" id="use_pasv" class="checkbox" <?php checked( $use_pasv, 1 ); ?> />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <?php
                        $mapping_from_db = get_option('wf_cpn_csv_imp_exp_mapping');
                        if (!empty($mapping_from_db)) {
                        ?>
                            <tr>
                                <th>
                                    <label for="profile"><?php _e('Select a mapping file.'); ?></label>
                                </th>
                                <td>
                                    <select name="profile">
                                        <option value="">--Select--</option>
                                        <?php foreach ($mapping_from_db as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th><label><?php _e('Update coupon if exists', 'wf_order_import_export'); ?></label><br/></th>
                            <td>
                                <input type="checkbox" id="merge" name="merge">
                                <p><small><?php _e('Existing coupons are identified by their IDs. ', 'wf_order_import_export'); ?></small></p>
                            </td>
                        </tr>
                        <tr>
                            <th><label><?php _e( 'Delimiter', 'wf_order_import_export' ); ?></label><br/></th>
                            <td><input type="text" name="delimiter" placeholder="," size="2" /></td>
                        </tr>
                        <tr>
                            <th><label for="sku_checkbox"><?php _e( 'Use product SKU instead of product ID in coupon restriction settings', 'wf_order_import_export' ); ?></label><br/></th>
                            <td><input type="checkbox" name="sku_checkbox" id="sku_checkbox" /></td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit">
                    <input type="submit" class="button button-primary" value="<?php esc_attr_e( 'Upload file and import' ); ?>" />
                </p>
            </form>
        <?php endif; ?>
    </div>
</div>