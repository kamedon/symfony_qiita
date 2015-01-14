<?php
namespace KamedonQiitaBundle\Api\Qiita;

use Doctrine\Common\Cache\Cache;
use Lsw\MemcacheBundle\Cache\LoggingMemcache;

/**
 * Created by IntelliJ IDEA.
 * User: kamedon
 * Date: 15/01/09
 * Time: 22:19
 */
class QiitaApi
{
    private $token;
    /** @var  Cache */
    private $cacheProvider;

    public function __construct($token)
    {
        $this->token = $token;
    }

    private function createContext($token)
    {
        $context = stream_context_create(array(
            'http' => array(
                'ignore_errors' => true,
                'header' => "Authorization:Bearer " + $token
            )
        ));
        return $context;
    }

    /**
     * @param Cache $cacheProvider
     * @return $this
     */
    public function setCacheProvider(Cache $cacheProvider)
    {
        $this->cacheProvider = $cacheProvider;
        return $this;
    }


    /**
     * @param $url
     * @return string
     */
    public function requestToQiita($url)
    {
        $context = $this->createContext($this->token);
        $res = file_get_contents($url, false, $context);
        return $res;
    }

    /**
     * @param $url
     * @return null|string
     */
    public function requestToCache($url)
    {
        try {
            $key = md5($url);
            $res = $this->cacheProvider->fetch($key);
            if (!$res) {
                $res = $this->requestToQiita($url);
                $this->cacheProvider->save(md5($url), $res, 6000);
            }
            return $res;
        } catch (\Exception $e) {
            return $this->requestToQiita($url);
        }
        return null;
    }

    public function request($url)
    {
        if ($this->cacheProvider != null) {
            $res = $this->requestToCache($url);
        } else {
            $res = $this->requestToQiita($url);
        }
        return json_decode($res);
    }


}