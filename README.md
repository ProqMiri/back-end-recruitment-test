## Layihənin təsviri
Onlayn sorğu yaratmaq üçün kiçik bir layihəni həyata keçirməlisiniz. Üç ekran olmalıdır. Ekranlar arasında keçid etmək üçün naviqasiya elementləri olmalıdır. 

## Ümumi təsvir
- Zəhmət olmasa Phalcon Framework, Javascript və MySQL istifadə etməklə sorğu layihəsini tətbiq edin.
- Repozitoriyanı fork edin. Hər tapşırığı bitirdikdən sonra, dəyişiklikləri commit etməyi unutmayın.
- Proyektin içərisində database yaratmaq üçün SQL script və ya migrasiya scripti olmalıdır. Layihə üçün database cədvəl strukturunu özünüz yaratmalısınız.
- Layihəni başlatmaq üçün təlimatı INSTALL.MD yazmaq unutmayın.
- Bütün PHP asılılıqları “composer”-in köməyi ilə yüklənməlidir (bu halda composer.json repozitoriyaya əlavə etməyi unutmayın)
- Saytın görünüşünə və kodun təmizliyinə böyük önəm verilir. Bunun üçün siz hər hansı UI-kitabxanalardan istifadə edilə bilərsiniz. 
 
### Ekran №1: Sorğu yaratmaq
Bu ekranda istifadəçi sorğu hazırlayır. Onun adı və suallarının sayı daxil edilməlidir. 
- Sorğuda 30-a qədər sual ola bilər. 
- Hər bir sualın minimal 2 və maksimal 5 cavabı olmalıdır.
- Hər bir sualda yalnız bir düzgün cavab ola bilər.
- Hər bir sual və cavablar avtomatik şəkildə generasiya olmalıdırlar.
- Düzgün cavab variantı random təyin olunmalıdır.
 
Bir sorğu yaratmaq üçün istifadəçi "Sorğu yarat" düyməsini basmalıdır. 

![](https://user-images.githubusercontent.com/3234413/61618392-c9eaab80-ac7d-11e9-86f1-2842a7b584f4.png)
 
### Ekran №2: Sorğuların siyahısı
Bu ekran generasiya olunmuş sorğuların siyahısını göstərməlidir. ID, ad, sualların sayı və sorğu bitdiyi halda nəticə göstərilməlidir. Nəticədə düzgün cavabların sayı və faiz nisbəti göstərilir. Belə ki, əgər istifadəçi 20 suallıq sorğudan keçsə və 5 sualı düzgün cavablandırsa, bu sütun 5/20 (25%) kimi olmalıdır. Hər bir keçilməmiş sorğuda “Sorğudan keç” düyməsi olmalıdır.

### Ekran №3: Sorğunu keç
Bu ekranda sorğunu keçmək üçün UI tətbiq etməlisiniz. 

![](https://user-images.githubusercontent.com/3234413/61618396-ca834200-ac7d-11e9-9799-20a56ca5b6a7.png)


Cavab variantı olaraq hərfləri və ya nömrələri istifadə edə bilərsiniz. 
Mümkün cavab variantlarının dairələri interaktiv olmalıdır. 
Seçilən cavab xüsusi işarələnməlidir (sarı dairə şəklində çəkilmiş, daha qalın bir çərçivə ilə tərtib edilmiş və s. kimi). 

İstifadəçi yalnız bir cavab seçə bilər.

Əgər seçilmiş cavab variantı dəyişərsə əvvəlki cavab variantı ağ dairə kimi yenidən tərtib olunmalıdır. 

**Saxla** və **Hazırdır** düyməsi olmalıdır.

**Saxla** - İstifadəçi hal-hazırda neçə ədəd suala cavab vermişdirsə o forma yadda saxlanılacaq və istifadəçi Sorğular (ekran №2) səhifəsinə yönləndiriləcək. Növbəti dəfə həmin sorğuya daxil olduqda, istifadəçi sorğuya qaldığı yerdən davam edə bilməlidir. 

**Hazırdır** - İstifadəçi artıq testləri bitirmişdir və nəticəni yoxlamaq üçün sorğunu sonlandırır. Bu zaman cavablar yoxlanılaraq sorğu zamanı verilən doğru cavabların sayı və faiz nisbəti istifadəçiyə göstərilməlidir. Bundan sonra istifadəçiyə Sorğular (ekran №2) səhifəsinə qayıtmaq üçün müvafiq imkan yaradılmalıdır və orada yenilənmiş məlumatlar göstərilməlidir. 

İstifadəçinin bütün sualları cavablandırdığını bilmək üçün xüsusi yoxlama funksiyası olmalıdır. Əgər bütün suallar cavablanmadan "Hazırdır" basılıbsa istifadəçiyə bütün sualların cavablanmalı olduğunu göstərən informasiya verilməlidir.

