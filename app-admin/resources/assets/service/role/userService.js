module.exports = (function () {

    var _store = function store(opts) {
        ajax({
            type: 'POST',
            url: '/api/role/user/store/' + opts.params.id,
            data: opts.data,
            dataType: 'json',
            beforeSend: opts.beforeSend,
            success: opts.sucFn,
            error: opts.errFn
        });
    };

    var _update = function update(opts) {
        ajax({
            type: 'POST',
            url: '/api/role/user/update/' + opts.params.id,
            data: opts.data,
            dataType: 'json',
            beforeSend: opts.beforeSend,
            success: opts.sucFn,
            error: opts.errFn
        });
    };

    var _roleUserDelete = function (opts) {
        $.http({
            type: 'POST',
            dataType: 'json',
            url: '/api/role/user/delete/' + opts.data.id,
            data: opts.data,
            success: opts.success,
            error: opts.error
        });
    };

    return {
        store: _store,
        update: _update,
        roleUserDelete: _roleUserDelete
    };
})();