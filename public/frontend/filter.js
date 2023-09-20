const filter = {
    toggle: {
        btnIcon: function (jQBtn) {
            jQBtn.find('.mdi')
                .toggleClass('mdi-filter')
                .toggleClass('mdi-close')

        },
        content: function (target) {
            target.next().toggleClass('col-6 col-sm-8')
            target.next().find('.row').children()
                .toggleClass('col-6 col-sm-4 col-md-3')
                .toggleClass('col-12 col-sm-6 col-md-4')
        },
        menu: function (target) {
            return target
                .toggleClass('d-none d-lg-block')
                .toggleClass('d-block col-6 col-sm-4')
        },

    },
    clickHandler: function (event) {
        let btn = $(event.target)
        let target = $(event.target.dataset.target)
        this.toggle.btnIcon(btn)
        this.toggle.menu(target)
        this.toggle.content(target)

    }
}