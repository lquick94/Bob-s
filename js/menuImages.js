    var layout = null,
        layoutRegex = /\?layout=(.*)/,
        layouts = ['adaptive', 'fixed', 'fluid', 'responsive'];

    function switchLayout(layout) {
      layouts.forEach(function (element, index, array) {
        document.body.classList.remove(element);
      });
      document.body.classList.add(layout)
    }
    layout = layoutRegex.exec(location.search)
    if (layout !== null && layout[1] !== undefined) {
      switchLayout(layout[1]);
    }