<?php

use Illuminate\Database\Seeder;

class SettingsSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\GeneralSetting::create([
            'ar_name'=>'مؤسسة PreSchool لخدمات رياض الأطفال',
            'en_name'=>'PreSchool',
            'ar_header_title'=>'مؤسسة PreSchool لخدمات رياض الأطفال',
            'ar_header_subTitle'=>' حيث كل فكرة تسهم في بناء الإنسان!',
            'ar_about_title'=>'نبذة تعريفية',
            'ar_about_content'=>'مؤسسة PreSchool لخدمات رياض الأطفال تقدم أفضل الخدمات والأنظمة لرياض الأطفال في شتى المجالات المختلفة وتسعى المؤسسة إلى تقديم أفضل الخدمات و الحلول التقنية والبرمجيات المتطورة في خدمة رياض الأطفال من أجل استثمار التقنيات والخدمات العالمية المتوفرة بالشكل الأمثل للحصول على النتائج والتقارير المتكاملة من أجل وصول إدارة رياض الأطفال و أولياء أمور الطلاب إلى القرارات والنتائج الصحيحة آخذين بعين الاعتبار توفير الوقت والجهد والمال للجميع.',
            'ar_activities_title'=>'أنشطة وفعاليات',
            'ar_partner_title'=>'شركاء النجاح',
            'ar_contact_content'=>'التواصل والاقتراحات',
            'ar_footer_content'=>'مؤسسة PreSchool لخدمات رياض الأطفال',
            'youtube_url'=>'https://www.youtube.com/',
            'app_url'=>'',
            'facebook'=>'https://www.facebook.com/',
            'twitter'=>'https://www.goolge.com/',
            'instagram'=>'https://www.instagram.com/',
            'google'=>'https://twitter.com/?lang=ar',
            'ar_address'=>'فلسطين',
            'ar_policy'=>'',
            'ar_terms'=>'',
            'en_header_title'=>'',
            'en_header_subTitle'=>'',
            'en_about_title'=>'',
            'en_about_content'=>'',
            'en_activities_title'=>'',
            'en_partner_title'=>'',
            'en_contact_content'=>'',
            'en_footer_content'=>'',
            'en_terms'=>'',
            'en_policy'=>'',
            'en_address'=>'',
            'pannel_main_color'=>'rgb(40,118,171)',
            'pannel_secondary_color'=>'#579ac7',
            'fast_access_color'=>null,
            'mobile'=>'+999 999 9999',
            'email'=>' INFO@RAWAFED.EDU.PS',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
    }
}
