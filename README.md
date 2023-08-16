# Magento 2 için Türkiye Vergileri Eklentisi

Magento 2 sitenize Türkiye vergilerini ekler.

# Kurulum
 - Zip içinden çıkan dosyaları `/app/code/Grinet/TurkeyTaxes` klasörüne yükleyin

( Unix/Linux/MacOSX için ) 
Magento ana klasörünüze girip aşağıdaki komutları çalıştırın :
```bash
php bin/magento module:enable Grinet_TurkeyTaxes
php bin/magento setup:upgrade
php bin/magento cache:clean
```

# Composer ile kurulum
```bash
composer require grinet/turkeytaxes
php bin/magento module:enable Grinet_TurkeyTaxes
php bin/magento setup:upgrade
php bin/magento cache:clean
```

# Hata bildirimi

Gördüğünüz hataları info@grinet.com.tr adresimize iletebilirsiniz...

-----------------------------------------------------------------

# Turkey Tax Rates for Magento 2

This extension adds Turkey Regions to your Magento2.

# Installation
 - Copy all files to `/app/code/Grinet/TurkeyTaxes` directory

( For Unix/Linux/MacOSX ) 
Go to your root folder of your magento site and run these commands :
```bash
php bin/magento module:enable Grinet_TurkeyTaxes
php bin/magento setup:upgrade
php bin/magento cache:clean
```

# Installation with composer
```bash
composer require grinet/turkeytaxes
php bin/magento module:enable Grinet_TurkeyTaxes
php bin/magento setup:upgrade
php bin/magento cache:clean
```

# Error reporting

Please send errors to info@grinet.com.tr ...

------------------------------------------------------------------
# Ekran Görüntüleri / Screenshots
<img src="https://grinet.com.tr/images/magento2_taxes/shot_prod.png">
<img src="https://grinet.com.tr/images/magento2_taxes/shot_conf1.png">
<img src="https://grinet.com.tr/images/magento2_taxes/shot_conf2.png">
