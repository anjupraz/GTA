@extends('layouts.frontend')
@section('title', 'Privacy Policy')
@section('content')
<div id="page_caption" class="hasbg parallax" style="text-align:center;height:300px; background-image:url({{asset('assets/frontend/images/banner3.jpg')}});background-position: center center;color:#ffffff;">
    @include('frontend.include.overlay')
    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>Privacy Policy</h1>
            </div>
        </div>
    </div>
</div>
<!-- Begin content -->
<div id="page_content_wrapper" class="hasbg ">
    <div class="inner">
        <!-- Begin main content -->
        <div class="inner_wrapper">
            <div class="sidebar_content full_width nopadding">
                <div class="sidebar_content page_content">
                    <p>
                        This policy discloses the privacy practices followed by Event Solution (henceforth referred to as Event Solution). Event Solution is committed to protecting your privacy. Whenever we ask you to provide personally identifiable information during your use of this Facebook or our website, you can rest assured that we will use it only in accordance with this privacy statement.
                    </p>
                    <h4 class="p1"><span class="s1"><b>What information we collect?</b></span></h4>
                    <p>
                        <strong>Non-personal information</strong>
                        We may automatically collect non-personally identifiable information about you such as your IP address, your browser type, the device you use to access www.midvalley.edu.np, and your operating system.
                    </p>
                    <p>
                        <strong>Personal information</strong>
                        When you request our prospectus, schedule an appointment with us, register for enrolling in our college, or contribute user-generated content, we collect personal information from you including, but not limited to, your name, phone number, and email address. We may also ask you for information when you report a problem to our helpdesk and may keep a record of any correspondence.
                    </p>
                    <br/>
                    <h4 class="p1"><span class="s1"><b>How we use the information we collect?</b></span></h4>
                    <p>
                        We use your personal information for internal record keeping. We may periodically send you promotional emails about our college, newsletters, special offers, or other information which we think you may find interesting. We may also contact you for market research purposes by email or phone.
                        We use the non-personally identifiable information only to provide an effective service on our website.
                        We do not share, sell or rent your personal information or your non-personal information with/to third parties for their marketing purposes. We may disclose aggregate statistics about our training and our website traffic in order to describe our services to prospective partners, advertisers, and other reputable third parties, but these statistics will not include personally identifying information.
                        We cooperate with law enforcement authorities as well as with other third parties to enforce laws, protect intellectual property rights and prevent fraud. We may disclose your personal information if required to do so by law.
                    </p>
                    <br/>
                    <h4 class="p1"><span class="s1"><b>User-generated content</b></span></h4>
                    <p>
                        If you contribute user-generated content to EVENT SOLUTION, for instance a comment on our blog, some of your personal data (such as your name and email address) may be displayed on the website. When submitting any such content, you acknowledge and agree that EVENT SOLUTION may access, preserve, and disclose your information and any content posted by you in order to:
                        <ol>
                            <li>Enforce the terms and conditions of use;</li>
                            <li>Comply with any legal process;</li>
                            <li>Respond to claims that any content posted violates the rights of third parties;</li>
                            <li>Respond to your requests for customer service;</li>
                            <li>Protect the rights, property, or personal safety of EVENT SOLUTION, other users of the website, and the public.</li>
                        </ol>
                    </p>
                    <br/>
                    <h4 class="p1"><span class="s1"><b>Cookies</b></span></h4>
                    <p>
                        When you visit our site, a small text file called a cookie is stored by your browser on your computer. Cookies do not contain personal details and do not in any way give us access to your computer. We use cookies only for traffic analysis. This information helps us with customer experience management. You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser settings to decline them. This may, however, prevent you from taking full advantage of our website. We do not sell or give the statistics stored on cookies to any third parties for data-mining or marketing purposes.
                    </p>
                    <br/>
                    <h4 class="p1"><span class="s1"><b>Third-Party Cookies</b></span></h4>
                    <p>
                        Cookies may be set on your computer by third parties like YouTube, Twitter, Facebook, or other social media services for which EVENT SOLUTION has implemented plugins. You should determine the cookie policies of these websites by visiting their privacy policy pages directly.
                    </p>
                    <br/>
                    <h4 class="p1"><span class="s1"><b>Links to other websites</b></span></h4>
                    <p>
                        While using our website, you may find links to external websites. When you click on these links and leave our site, you are subject to the privacy policies of those websites. We do not have any control over them and therefore cannot accept any responsibility for the protection and privacy of any information which you provide while using such sites.
                    </p>
                    <br/>
                    <h4 class="p1"><span class="s1"><b>Controlling your personal information</b></span></h4>
                    <p>
                        You may choose to restrict the collection or use of your personal information in the following ways:
                        <ol>
                            <li>If you have previously consented to us using your personal information for direct marketing, you may change your mind at any time by sending us an email at info@midvalley.edu.np.</li>
                            <li>If you believe that any information we have of you is incorrect or incomplete, please send us an email as soon as possible. We will promptly correct any information found to be incorrect.</li>
                        </ol>
                    </p>
                    <br/>
                    <h4 class="p1"><span class="s1"><b>Information protection</b></span></h4>
                    <p>
                        We have put in place technological and operational security functions steps to prevent your personal information from misuse, loss, alteration or destruction. However, no method of transmission over the internet is 100% secure, and as such, you transmit at your own risk.
                    </p>
                    <br/>
                    <h4 class="p1"><span class="s1"><b>Consent</b></span></h4>
                    <p>
                        By using our Facebook page or website, you consent to the collection and use of your personal information as described in this privacy policy.
                    </p>
                    <br/>
                    <h4 class="p1"><span class="s1"><b>Changes to the Policy</b></span></h4>
                    <p>
                        We may amend this policy from time to time. All changes will be posted on this page. We advise that you review this page regularly if you would like to keep track of the changes. This policy is effective from 14 Aug 2018.
                    </p>
                    <br/>
                    <p>
                        Thank you for going over this document. If you have any questions about this policy, please write to us at eventsolutionnepal@gmail.com
                    </p>
                </div>
                @include('frontend.include.sidebar')
            </div>
        </div>
        <!-- End main content -->
    </div>
</div>
<br class="clear" />
<br/>
@endsection
