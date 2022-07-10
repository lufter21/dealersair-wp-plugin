(function () {
    let tplScripts = [
        'js/slick.min.js',
        'js/script.defer.js?v=@version@',
        'js/common.defer.js?v=@version@',
        'js/interface.js?v=@version@'
    ].map(src => nxtTkJS.assetsDirPath + src);

    if (nxtTkJS.deferScriptsBefore) {
        tplScripts = nxtTkJS.deferScriptsBefore.concat(tplScripts);
    }

    if (nxtTkJS.deferScriptsAfter) {
        tplScripts = tplScripts.concat(nxtTkJS.deferScriptsAfter);
    }

    document.addEventListener('DOMContentLoaded', function () {
        'use strict';

        [
            nxtTkJS.assetsDirPath + 'js/jquery-3.1.1.min.js',
            nxtTkJS.assetsDirPath + 'js/script.head.js?v=@version@',
            nxtTkJS.assetsDirPath + 'js/common.head.js?v=@version@'
        ].forEach(function (src) {
            const scrEl = document.createElement('script');
            scrEl.async = false;
            scrEl.defer = true;
            scrEl.src = src;
            document.body.appendChild(scrEl);
        });

        // defer scripts
        let loading = false;

        function initLoad() {
            if (loading) {
                document.removeEventListener('mousemove', initLoad);
                document.removeEventListener('touchstart', initLoad);
                window.removeEventListener('scroll', initLoad);
                return;
            }

            if (nxtTkJS.deferScriptsStartLoading) {
                nxtTkJS.deferScriptsStartLoading();
            }

            loading = true;

            let i = 0;

            tplScripts.forEach(function (src) {
                const scrEl = document.createElement('script');
                scrEl.async = false;
                scrEl.defer = true;

                scrEl.addEventListener('load', function () {
                    i++;

                    if (i === tplScripts.length && nxtTkJS.deferScriptsHaveBeenLoaded) {
                        nxtTkJS.deferScriptsHaveBeenLoaded();
                    }
                });

                scrEl.src = src;
                document.body.appendChild(scrEl);
            });
        }

        document.addEventListener('mousemove', initLoad);
        document.addEventListener('touchstart', initLoad);
        window.addEventListener('scroll', initLoad);
    });
})();