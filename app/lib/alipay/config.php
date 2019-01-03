<?php
return array (
    //应用ID,您的APPID。
    'app_id' => "2016092200569678",
    
    'method' => 'alipay.trade.wap.pay',
    
    'timestamp' => date( 'Y-m-d H:i:s' ),
    
    'version' => '1.0',

    //商户私钥
//		'merchant_private_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA3zYK5Lj5z323FGBw8J/uEVYFZZ8xMSXmGq+xEUxTf7WBjbXdoGwIAX9ndIabGwmdmrM9b/6cpQ6joAqPIpCEdVaVUE0ciYF3rIiCOpLi7zf6IR4hGel1FNW47rm67/fiU7w54uk6PhhpBueslf47sTrP6O4XoMrM5tP9Ctam7rbOA23Cm5AcaWDviE02rcoum4NhUJ3aCliwbgNiUgG8u0tUR+3yi1J3DDs/6roKCc5uKJegQa3WddJ8w6vancLvpYkyeSF+ODpB4IKnnuiuPdGt7ayJ7kFPxYAg7PyTgvsyXENDXmX+h1lJNkK8tIdLYOIyPcADRLQKJrztPj6XSwIDAQAB",
    'merchant_private_key' =>"MIIEowIBAAKCAQEA5lnAV/b+pH1gB0m2At1qdRhie2Sp8jOdhyI+QvVt8iRRn2dW3J5X+wEjkQY2K+1EyPvKD6xMBn1PiPhXK+4TCPDERycR3NzzPvfZM6fokTXJ24MoYXU6Mi+4ZLrnHLksvD3F/KOWE8m93NSykIDDppQ/vm0WO8EbviR1BA4Awf3L+gXp/pqu6pYZgdCWd0PuJ5tTlxJpwUC/Kd0yY7pv81vDuAh1QFAHhHWpwj5mP4R4+2GwfcrGZ1XRI9AtkYQUvXFlQYwGOVoQyFbFyxby+c39z4Xu36sQ/LdrqPULx48uQtXntKj7Mo4V6mmrFGNKe0SDckqCIEOe7/St7XJvywIDAQABAoIBAHRvc5lDQW4V7b9hU/5Yu2IbBFTJClpiGsNe3Mft1ThrgVKo4rA73c8DwV2iHSnREk7hbz7C4d754oUiurV67uY7BYvNxOq2SMJQd9rzicw0uycZQgUZQ2Rw2K0aCI5tT56LPxO4ALlZ5X3FickfPUZrc1knPPDRaNuRBBEbnuhvEtQOLONVUNfMcZfsBogxExZDgiE8FhUhu9Gc25rFcSJfBghY1mGeAIH7Lar0eizQbp1ZlCDc3sYbHS5IVeq2KKsA67LJ/30tIVtqsriA7DPJ42VV/dVO1v0NCCjGmuA3GJe3H/fgklEA0DBZmnAlhJ7iRlMwmD+dta7NvivxiXkCgYEA+yZS4+qi3iQ3N1xlzK+79ZPOSR0PDOP/zmrDbY3G4eISSG1HDGWXFBEVGlf3uDrdJVkGNO4WNh8e10piF+uzLEyzkVZVB0UuNqZoqfHYXW8ySG1e+QjQGsu6l0GM/U51+Ao21QcIDV76t/drwCDn/dh3DyaD2+zp6YYTff0gya0CgYEA6syY71yphgHXgwlwBi+sqxhv2REbKXrvEHtmS8RBGMagkD899hG/2dk3jxzbhkt7dc7yClZhWGj3V79IYvrUUhwMMLt7elPMaMDUVdwjLvrWwWf71HfaEhjwPUuagaxbgK4p98EjIkFhJG39XO5N6GkZgJZflmFM6rFrr4sOPlcCgYBFiuga6iatAjQz5SbfFa4jIwlU33ICbMOxgYiZtk9izrmnSnMI8LxztwMz5zXV0p7Xr53zXBXUaKuei5875m0XkCmMze3/dF2Gjm+e1zPFM3wl5/sLVDBjqxQAvArxPR+XTiS+uhK1uR4NgLpaWgJDHQRispSCekiO/Cw7j7LbhQKBgD0J1RQcpaFFp03UTT/+csfDwYfPb5037R/+xFgb+8RCFomJN0VZ1eL/GfdlTBg8VSsKElfnnsTJ/Mrd2iaJCFsUGYMtqeriD/iHcGuln6vd36hFrOzN/23G9+UnW1IsiVkJbbWPit+j2WoMAdp/xNcPQ2bvMIg6YTF9z/3Bi4FfAoGBAJHzTHdm5YoUAC/7jajdwkRuThO37b9SS3ZLX82+I/6maPxe+oR7QvpbbHOO7aUSqzQCc95DsatZOqtB8LQNVBrwGu7T6NCNX/V8HO7CBP1uZ8zffr94bpBJDUtI72buJLUscpVKc3C0PwHLEh9Rd2DWZLi9OnX1CM9uV8b6AKmw",
    //异步通知地址
//		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",

    'notify_url' => "http://larvael.yzzznh.cn/successdetail",

    //同步跳转
//		'return_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/return_url.php",
    'return_url' => "http://larvael.yzzznh.cn",//http://larvael.yzzznh.cn",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA5lnAV/b+pH1gB0m2At1qdRhie2Sp8jOdhyI+QvVt8iRRn2dW3J5X+wEjkQY2K+1EyPvKD6xMBn1PiPhXK+4TCPDERycR3NzzPvfZM6fokTXJ24MoYXU6Mi+4ZLrnHLksvD3F/KOWE8m93NSykIDDppQ/vm0WO8EbviR1BA4Awf3L+gXp/pqu6pYZgdCWd0PuJ5tTlxJpwUC/Kd0yY7pv81vDuAh1QFAHhHWpwj5mP4R4+2GwfcrGZ1XRI9AtkYQUvXFlQYwGOVoQyFbFyxby+c39z4Xu36sQ/LdrqPULx48uQtXntKj7Mo4V6mmrFGNKe0SDckqCIEOe7/St7XJvywIDAQAB",
);