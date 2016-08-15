app.controller('menu.edit', main);

function main() {
    this.contacts = [];
}

main.prototype.greet = function(argument) {
    alert(this.name);
};

main.prototype.addMenu = function(argument) {
    this.contacts.push({});
};


main.prototype.del = function(contactToRemove) {
    var index = this.contacts.indexOf(contactToRemove);
    this.contacts.splice(index, 1);
	
  };	