<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
?>
<div class="block-reviews">
    <div class="tabs">
        <div class="tabs-control">
            <a href="#" class="btn-tab">Disqus</a> <a href="#" class="btn-tab">ВКонтакте</a> <a href="#" class="btn-tab">Facebook</a>
        </div>
        <div class="tabs-items">
            <div class="tab-item">
                <div id="disqus_thread">
                </div>
                <script>
                var disqus_config = function () {
                this.page.url = "<? echo 'http://'.$_SERVER['SERVER_NAME'].$APPLICATION->GetCurPage() ?>";
                this.page.identifier = "<? echo 'http://'.$_SERVER['SERVER_NAME'].$APPLICATION->GetCurPage() ?>";
                };
                (function() {
                    var d = document,
                        s = d.createElement('script');
                    s.src = 'https://sambo-msk-ru.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
                </script>
            </div>
            <div class="tab-item">
                <!-- Put this script tag to the <head> of your page -->
                <script type="text/javascript" src="//vk.com/js/api/openapi.js?146"></script>
                <script type="text/javascript">
                VK.init({ apiId: 6115583, onlyWidgets: true });
                </script>
                <!-- Put this div tag to the place, where the Comments block will be -->
                <div id="vk_comments">
                </div>
                <script type="text/javascript">
                VK.Widgets.Comments("vk_comments", { limit: 10, attach: "*" });
                </script>
            </div>
            <div class="tab-item">
                <div id="fb-root">
                </div>
                <script>
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.10&appId=133137297032243";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                </script>
                <div class="fb-comments" data-href="<? echo 'http://'.$_SERVER['SERVER_NAME'].$APPLICATION->GetCurPage() ?>" data-width="100%" data-numposts="5">
                </div>
            </div>
        </div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>