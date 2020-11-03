<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include_once("./sms/CCPRestSmsSDK.php");

class BaseController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

        $this->load->model('BaseModel');

        header('Cache-Control: no cache');
        date_default_timezone_set('Asia/Shanghai');
    }

    public function loginCheck()
    {
        if(!isset($this->session->email))
            redirect("/login/index");
    }

    public function consulterLoginCheck()
    {
        if(!isset($this->session->consulterAccount))
            redirect("/login/consulterLogin");
    }

    public function template($view, $param = null)
    {
        $this->loginCheck();

        $this->load->view('/template/header');
        $this->load->view('/template/sidebar');
        $this->load->view('/template/mobileheader');
        $this->load->view('/template/topbar');
        $this->load->view($view, $param);
        $this->load->view('/template/footer');
    }

    public function consulterTemplate()
    {
        $this->consulterLoginCheck();

        $this->load->view('/template/consulterTemplate', $this->data);
    }

    public function testTemplate()
    {
        $this->load->view('/template/testTemplate', $this->data);
    }

    public function mobileTemplate()
    {
        $this->load->view('/template/mobileTemplate', $this->data);
    }

    public function recurse_copy($src,$dst)
    {
        $dir = opendir($src);

        if (!file_exists($dst)) {
            mkdir($dst, 0777, true);
        }

        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..')) {
                if (file_exists($src . '/' . $file)) {
                    if (is_dir($src . '/' . $file)) {
                        $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                    } else {
                        copy($src . '/' . $file, $dst . '/' . $file);
                    }
                }
            }
        }

        closedir($dir);
    }

    public function deleteDirectory($path)
    {
        if (is_dir($path) === true) {
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file) {
                $this->deleteDirectory(realpath($path) . '/' . $file);
            }

            return rmdir(realpath($path));
        }
        else if (is_file($path) === true) {
            return unlink($path);
        }

        return false;
    }

    public function isIncludeSpaceCharacter($value)
    {
        if (empty($value))
            return false;

        if (strpos($value, " "))
            return true;
        else
            return false;
    }

    public function generateSuffix()
    {
        $chars = md5(uniqid(mt_rand(), true));
        return substr($chars, 10, 3);
    }

    public function generateVerificationCode()
    {
        $result = "";
        for ($i = 0; $i < 6; $i++)
        {
            $result .= rand(0, 9);
        }

        return $result;
    }

    function sendTemplateSMS($to,$datas,$tempId)
    {
        $accountSid= '8a216da8679d0e9d01679d7d246a0064';

        //主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
        $accountToken= 'f7c32f831bba42f794f8a74829f5c9a7';

        //应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
        //在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
        $appId='8a216da8679d0e9d01679d7d24d4006b';

        //请求地址
        //沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
        //生产环境（用户应用上线使用）：app.cloopen.com
        $serverIP='app.cloopen.com';

        //请求端口，生产环境和沙盒环境一致
        $serverPort='8883';

        //REST版本号，在官网文档REST介绍中获得。
        $softVersion='2013-12-26';
        // 初始化REST SDK

        $rest = new REST($serverIP,$serverPort,$softVersion);
        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);

        // 发送模板短信
        //  echo "Sending TemplateSMS to $to <br/>";
        $returnValue = 1;
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
            // echo "result error!";
            //break;
            $returnValue = "result error!";
        }
        if($result->statusCode!=0) {
            // echo "error code :" . $result->statusCode . "<br>" . "error msg :" . $result->statusMsg . "<br>";
            //TODO 添加错误处理逻辑
            $returnValue = 2;
            $returnValue = "error code :" . $result->statusCode . "<br>" . "error msg :" . $result->statusMsg . "<br>";
        }else{
            // echo "Sendind TemplateSMS success!<br/>";
            // 获取返回信息
            // $smsmessage = $result->TemplateSMS;
            // echo "dateCreated:".$smsmessage->dateCreated."<br/>";
            // echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
            // echo '1';
            $returnValue = 1;
            //TODO 添加成功处理逻辑
        }

        return $returnValue;
    }

    /**
     * Function : call restful api
     * Parameter: method, url, $data
     * Return   :
     *      returnData :
     * Creator  : clark
     * Date     : 20190203
     */
    function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
}
