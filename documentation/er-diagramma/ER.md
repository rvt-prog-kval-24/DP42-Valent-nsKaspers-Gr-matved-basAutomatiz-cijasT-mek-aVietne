Sistēmas ER-modelis sastāv no entitijām (skat er.png.), kas nodrošina pamatinformācijas uzglabāšanu un apstrādi. Tas ir Kompanijas, Ziņas, Adm/user, Kompanijas, Jautājumi.
 
6.att. ER diagramm
Entitijam ziņas un Adm/user ir saišu “Many To Many”, jo katrs var likt, rediģēt vai dzēst visas ziņas un pie katrai ziņai pieder vairāki darbnieki.

Kompānijas:
Kompānijas glabā informāciju par uzņēmumiem, kas izmanto sistēmu. Katram uzņēmumam ir unikāls vat numurs, nosaukums, adrese, reg. numurs, tālrunis, e-pasts un apraksts.

Ziņas:
Ziņas glabā informāciju par ziņām, kas tiek publicētas sistēmā. Katrai ziņai ir status (aktīvs vai neaktīvs), ziņa saturs un apakšnosaukums.

Adm/user:
Adm/user glabā informāciju par sistēmas administratoriem un lietotājiem. Katram administratoram vai lietotājam ir unikāls vārds, e-pasts, parole.

Jautājumi:
Jautājumi glabā informāciju par atsutītam jautājumiem. Administratoriem. Katram jautājumam ir e-pasts, no kura bija atsutīts jautājums un jautājuma saturs.

Rēķins:
Rēķins glabā informāciju par maksājumiem.
