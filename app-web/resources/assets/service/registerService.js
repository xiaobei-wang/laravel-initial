module.exports = (function () {

    var _store = function store(opts) {
        $.http({
            type: 'POST',
            url: '/api/register',
            data: opts.data,
            dataType: 'json',
            beforeSend: opts.beforeSend,
            success: opts.sucFn,
            error: opts.errFn
        });
    };

    return {
        store: _store,
    };
})();