<?php
/**
 * Created by PhpStorm.
 * User: anokhin.a
 * Date: 25.07.2018
 * Time: 10:09
 */

namespace Helpers\Blueimp;
use Helpers\Blueimp\UploadHandler as UploaderHandler;

class CustomUploader extends UploaderHandler
{
    public function __construct($id, $key, $options = null, $initialize = false, $error_messages = null) {
        $this->response = array();
        $this->options = array(
            'script_url' => $this->get_full_url().'/'.$this->basename($this->get_server_var('SCRIPT_NAME')),
            'upload_dir' => dirname($this->get_server_var('SCRIPT_FILENAME')).'/uploads/'. $key . '/',
            'upload_url' => $this->get_full_url().'/uploads/' . $key . '/',
            'input_stream' => 'php://input',
            'user_dirs' => false,
            'mkdir_mode' => 0755,
            'param_name' => $key,
            'opera_id' => $id,
            // Set the following option to 'POST', if your server does not support
            // DELETE requests. This is a parameter sent to the client:
            'delete_type' => 'DELETE',
            'access_control_allow_origin' => '*',
            'access_control_allow_credentials' => false,
            'access_control_allow_methods' => array(
                'OPTIONS',
                'HEAD',
                'GET',
                'POST',
                'PUT',
                'PATCH',
                'DELETE'
            ),
            'access_control_allow_headers' => array(
                'Content-Type',
                'Content-Range',
                'Content-Disposition'
            ),
            // By default, allow redirects to the referer protocol+host:
            'redirect_allow_target' => '/^'.preg_quote(
                    parse_url($this->get_server_var('HTTP_REFERER'), PHP_URL_SCHEME)
                    .'://'
                    .parse_url($this->get_server_var('HTTP_REFERER'), PHP_URL_HOST)
                    .'/', // Trailing slash to not match subdomains by mistake
                    '/' // preg_quote delimiter param
                ).'/',
            // Enable to provide file downloads via GET requests to the PHP script:
            //     1. Set to 1 to download files via readfile method through PHP
            //     2. Set to 2 to send a X-Sendfile header for lighttpd/Apache
            //     3. Set to 3 to send a X-Accel-Redirect header for nginx
            // If set to 2 or 3, adjust the upload_url option to the base path of
            // the redirect parameter, e.g. '/files/'.
            'download_via_php' => false,
            // Read files in chunks to avoid memory limits when download_via_php
            // is enabled, set to 0 to disable chunked reading of files:
            'readfile_chunk_size' => 10 * 1024 * 1024, // 10 MiB
            // Defines which files can be displayed inline when downloaded:
            'inline_file_types' => '/\.(gif|jpe?g|png)$/i',
            // Defines which files (based on their names) are accepted for upload:
            'accept_file_types' => '/.+$/i',
            // The php.ini settings upload_max_filesize and post_max_size
            // take precedence over the following max_file_size setting:
            'max_file_size' => null,
            'min_file_size' => 1,
            // The maximum number of files for the upload directory:
            'max_number_of_files' => null,
            // Defines which files are handled as image files:
            'image_file_types' => '/\.(gif|jpe?g|png)$/i',
            // Use exif_imagetype on all files to correct file extensions:
            'correct_image_extensions' => false,
            // Image resolution restrictions:
            'max_width' => null,
            'max_height' => null,
            'min_width' => 1,
            'min_height' => 1,
            // Set the following option to false to enable resumable uploads:
            'discard_aborted_uploads' => true,
            // Set to 0 to use the GD library to scale and orient images,
            // set to 1 to use imagick (if installed, falls back to GD),
            // set to 2 to use the ImageMagick convert binary directly:
            'image_library' => 1,
            // Uncomment the following to define an array of resource limits
            // for imagick:
            /*
            'imagick_resource_limits' => array(
                imagick::RESOURCETYPE_MAP => 32,
                imagick::RESOURCETYPE_MEMORY => 32
            ),
            */
            // Command or path for to the ImageMagick convert binary:
            'convert_bin' => 'convert',
            // Uncomment the following to add parameters in front of each
            // ImageMagick convert call (the limit constraints seem only
            // to have an effect if put in front):
            /*
            'convert_params' => '-limit memory 32MiB -limit map 32MiB',
            */
            // Command or path for to the ImageMagick identify binary:
            'identify_bin' => 'identify',
            'image_versions' => array(
                // The empty image version key defines options for the original image.
                // Keep in mind: these image manipulations are inherited by all other image versions from this point onwards.
                // Also note that the property 'no_cache' is not inherited, since it's not a manipulation.
                '' => array(
                    // Automatically rotate images based on EXIF meta data:
                    'auto_orient' => true
                ),
                // You can add arrays to generate different versions.
                // The name of the key is the name of the version (example: 'medium').
                // the array contains the options to apply.
                /*
                'medium' => array(
                    'max_width' => 800,
                    'max_height' => 600
                ),
		*/
                'thumbnail' => array(
                    // Uncomment the following to use a defined directory for the thumbnails
                    // instead of a subdirectory based on the version identifier.
                    // Make sure that this directory doesn't allow execution of files if you
                    // don't pose any restrictions on the type of uploaded files, e.g. by
                    // copying the .htaccess file from the files directory for Apache:
                    //'upload_dir' => dirname($this->get_server_var('SCRIPT_FILENAME')).'/thumb/',
                    //'upload_url' => $this->get_full_url().'/thumb/',
                    // Uncomment the following to force the max
                    // dimensions and e.g. create square thumbnails:
                    // 'auto_orient' => true,
                    // 'crop' => true,
                    // 'jpeg_quality' => 70,
                    // 'no_cache' => true, (there's a caching option, but this remembers thumbnail sizes from a previous action!)
                    // 'strip' => true, (this strips EXIF tags, such as geolocation)
                    'max_width' => 80, // either specify width, or set to 0. Then width is automatically adjusted - keeping aspect ratio to a specified max_height.
                    'max_height' => 80 // either specify height, or set to 0. Then height is automatically adjusted - keeping aspect ratio to a specified max_width.
                )
            ),
            'print_response' => false
        );
        if ($options) {
            $this->options = $options + $this->options;
        }
        if ($error_messages) {
            $this->error_messages = $error_messages + $this->error_messages;
        }
        if ($initialize) {
            $this->initialize();
        }
    }
    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
                                          $index = null, $content_range = null) {
        $file = new \stdClass();
        $file->name = $this->get_file_name($uploaded_file, $name, $size, $type, $error,
            $index, $content_range);
        $file->size = $this->fix_integer_overflow((int)$size);
        $file->type = $type;
        $file->opera_id = $this->options['opera_id'];
        $file->category = $this->options['param_name'];
        if ($this->validate($uploaded_file, $file, $error, $index)) {
            $this->handle_form_data($file, $index);
            $upload_dir = $this->get_upload_path();
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, $this->options['mkdir_mode'], true);
            }
            $file_path = $this->get_upload_path($file->name);
            $append_file = $content_range && is_file($file_path) &&
                $file->size > $this->get_file_size($file_path);
            if ($uploaded_file && is_uploaded_file($uploaded_file)) {
                // multipart/formdata uploads (POST method uploads)
                if ($append_file) {
                    file_put_contents(
                        $file_path,
                        fopen($uploaded_file, 'r'),
                        FILE_APPEND
                    );
                } else {
                    move_uploaded_file($uploaded_file, $file_path);
                }
            } else {
                // Non-multipart uploads (PUT method support)
                file_put_contents(
                    $file_path,
                    fopen($this->options['input_stream'], 'r'),
                    $append_file ? FILE_APPEND : 0
                );
            }
            $file_size = $this->get_file_size($file_path, $append_file);
            if ($file_size === $file->size) {
                $file->url = $this->get_download_url($file->name);
                if ($this->is_valid_image_file($file_path)) {
                    $this->handle_image_file($file_path, $file);
                }
            } else {
                $file->size = $file_size;
                if (!$content_range && $this->options['discard_aborted_uploads']) {
                    unlink($file_path);
                    $file->error = $this->get_error_message('abort');
                }
            }
            $this->set_additional_file_properties($file);
        }
        return $file;
    }


}