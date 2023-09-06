function generateDate(date) {
    var DATE_FORMAT = new Date(date);
    const dtf = new Intl.DateTimeFormat('en', {
        year: 'numeric',
        month: 'short',
        day: '2-digit'
    })
    const [{
        value: mob
    }, , {
        value: dab
    }, , {
        value: yeb
    }] = dtf.formatToParts(DATE_FORMAT);
    return `${dab} ${mob} ${yeb}`
}
