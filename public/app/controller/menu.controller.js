app.controller('menu.edit', main);

function main() {
    this.name = "John Smith";
    this.contacts = [

    ];
}

main.prototype.greet = function(argument) {
    alert(this.name);
};

main.prototype.addMenu = function(argument) {
    this.contacts.push({});
};


