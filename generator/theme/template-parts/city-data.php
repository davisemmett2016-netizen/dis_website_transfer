<?php
/**
 * Davis Southern Septic — City Data & Local Personality Content
 */

function dss_get_counties_cities() {
    return [
        'fayette' => [
            'name'   => 'Fayette County',
            'cities' => [
                'Fayetteville','Peachtree City','Tyrone','Brooks','Woolsey',
                'Senoia','Sharpsburg','Inman','Kenwood','Lake City',
                'Riverdale','Flat Rock','Whitewater','Woolsey','Trilith'
            ],
        ],
        'henry' => [
            'name'   => 'Henry County',
            'cities' => [
                'McDonough','Stockbridge','Hampton','Locust Grove','Ellenwood',
                'Eagles Landing','Woodland','Ola','Kelleytown','Flippen',
                'Jenkinsburg','Sunny Side','Lake Dow','Heron Bay','Union Grove'
            ],
        ],
        'clayton' => [
            'name'   => 'Clayton County',
            'cities' => [
                'Jonesboro','Morrow','Riverdale','Forest Park','Lovejoy',
                'Lake City','Rex','Ellenwood','College Park','Hapeville',
                'Mountain View','Conley','Pointe South','Adamsville','Rough Creek'
            ],
        ],
        'coweta' => [
            'name'   => 'Coweta County',
            'cities' => [
                'Newnan','Senoia','Sharpsburg','Grantville','Moreland',
                'Turin','Haralson','Raymond','Luthersville','Arnco Mills',
                'Palmetto','Franklin','Madras','White Oak','Roscoe'
            ],
        ],
        'fulton' => [
            'name'   => 'Fulton County',
            'cities' => [
                'Atlanta','Sandy Springs','Roswell','Alpharetta','Johns Creek',
                'Milton','South Fulton','Chattahoochee Hills','Palmetto',
                'College Park','East Point','Fairburn','Union City','Hapeville','Loch Lomond'
            ],
        ],
        'douglas' => [
            'name'   => 'Douglas County',
            'cities' => [
                'Douglasville','Villa Rica','Lithia Springs','Winston','Austell',
                'Chapel Hill','Powder Springs','Mableton','Mirror Lake',
                'Fairplay','Bright Star','Campbellton','Centralhatchee','Sweetwater','Arbor Station'
            ],
        ],
        'gwinnett' => [
            'name'   => 'Gwinnett County',
            'cities' => [
                'Lawrenceville','Snellville','Loganville','Buford','Duluth',
                'Lilburn','Suwanee','Norcross','Sugar Hill','Dacula',
                'Grayson','Auburn','Braselton','Peachtree Corners','Berkeley Lake'
            ],
        ],
        'forsyth' => [
            'name'   => 'Forsyth County',
            'cities' => [
                'Cumming','Coal Mountain','Sharon','Gainesville','Sawnee',
                'Big Creek','Chestatee','Vickery','Polo','Sawnee Mountain',
                'Haw Creek','Midway','Settingdown','Windermere','Liberty Hill'
            ],
        ],
        'cherokee' => [
            'name'   => 'Cherokee County',
            'cities' => [
                'Canton','Ball Ground','Holly Springs','Waleska','Woodstock',
                'Nelson','Tate','Marble Hill','Hickory Flat','Free Home',
                'Buffington','Picketts Mill','Arnold Mill','Macedonia','Bluffs'
            ],
        ],
    ];
}

/* ================================================================
   UNIQUE LOCAL PERSONALITY CONTENT — one per major city
   Used on individual city pages to make them feel personal & local
================================================================ */
function dss_get_city_personality() {
    return [

        /* ---- FAYETTE COUNTY ---- */
        'fayetteville' => [
            'headline' => 'Proud to Serve the Heart of Fayette County',
            'story'    => 'Every time we roll through downtown Fayetteville on Highway 85, we love seeing the town square alive with people — whether it\'s a Friday evening at the farmers market or the courthouse square lit up during the holidays. Fayetteville has that rare small-town feel that\'s somehow stayed genuine even as everything around it has grown. We\'ve been helping Fayetteville homeowners keep their septic systems running right for years, and there is nowhere we\'d rather be on a Tuesday morning than serving a neighbor right here in our own backyard.',
            'landmark' => 'Fayetteville Town Square & Highway 85 Corridor',
        ],
        'peachtree-city' => [
            'headline' => 'Peachtree City\'s Trusted Septic Team',
            'story'    => 'We genuinely love Peachtree City — the golf cart paths, the way the lakes connect the villages, and the sense of community that runs through every neighborhood from Braelinn to Kedron. There is something special about a city that planned itself around quality of life rather than just square footage. We\'ve serviced systems in everything from lakefront homes off Flat Creek to newer developments near Peachtree Parkway, and every call reminds us why we do this work — to protect the homes people love.',
            'landmark' => 'Lake Peachtree, the Cart Paths & The Avenue Peachtree City',
        ],
        'tyrone' => [
            'headline' => 'Serving Tyrone\'s Growing Community',
            'story'    => 'Tyrone is one of those towns that gets better every year without losing its roots. We\'ve watched the Senoia Road corridor grow while the older neighborhoods along Shamrock Drive have stayed beautifully maintained. Our crew has worked on properties all over Tyrone — from the established homes near Shamrock Park to newer builds coming up fast. We\'re always happy to be here, and we treat every property like it\'s our own.',
            'landmark' => 'Shamrock Park & Senoia Road',
        ],
        'senoia' => [
            'headline' => 'From The Walking Dead Fans to Long-Time Residents — We Serve All of Senoia',
            'story'    => 'Senoia might be the most charming small town in all of Georgia. The historic downtown, the Victorian homes, the filming history — it has earned every bit of its reputation. We love pulling into Senoia on a job because it always feels like stepping into somewhere that cares. We\'ve worked on homes all over town, from the older properties near Main Street to the newer developments outside the historic district, and we treat every one with the same respect the town itself commands.',
            'landmark' => 'Senoia Historic Downtown & Main Street',
        ],
        'brooks' => [
            'headline' => 'Rural Roots, Reliable Service in Brooks',
            'story'    => 'Brooks is the kind of Georgia you picture when you close your eyes — big lots, tall pines, and neighbors who wave whether they know you or not. Out here, septic systems are not a footnote; they are how things work. We have been out to Brooks many times, and every job reminds us why we got into this business. People here take care of their land, and we take care of the systems that keep it all running.',
            'landmark' => 'The Rural Countryside of Southern Fayette County',
        ],

        /* ---- HENRY COUNTY ---- */
        'mcdonough' => [
            'headline' => 'McDonough — Where the Square Still Means Something',
            'story'    => 'We have a deep appreciation for McDonough\'s historic courthouse square. On any given Saturday, you\'ll find people grabbing coffee, watching kids run around the lawn, and doing the kind of unhurried living that bigger cities have forgotten. We\'ve serviced homes all over Henry County from McDonough, and when our truck rolls past the square heading to a job, it\'s a good reminder that the work we do keeps real families in real homes.',
            'landmark' => 'McDonough Courthouse Square',
        ],
        'stockbridge' => [
            'headline' => 'Fast, Reliable Septic Service for Stockbridge Families',
            'story'    => 'Stockbridge has grown into one of the most connected cities in Henry County — easy access to I-75, strong neighborhoods, and a real sense of community pride. We\'ve worked on everything from older septic systems in established subdivisions near Eagles Landing to new installs further out. The growth here is exciting, and we\'re glad to be part of keeping those homes healthy.',
            'landmark' => 'Eagles Landing & I-75 Corridor',
        ],
        'hampton' => [
            'headline' => 'Hampton: Race Weekend or Regular Tuesday, We\'re Here',
            'story'    => 'Hampton is famous for race weekends at Atlanta Motor Speedway, but for the people who live here, it\'s about community, open land, and the slower pace that southern Henry County offers. We\'ve been out to Hampton for everything from routine pump-outs to emergency calls, and we love the straight-talking people who live out here. Honest work for honest folks.',
            'landmark' => 'Atlanta Motor Speedway',
        ],
        'locust-grove' => [
            'headline' => 'Serving Locust Grove as It Grows',
            'story'    => 'If you want to watch Henry County\'s future take shape, drive through Locust Grove. The Tanger Outlets brought attention, but the real story is the families putting down roots here — building homes, raising kids, and creating a community worth investing in. We\'ve been part of that growth, installing and maintaining septic systems in new developments and established neighborhoods alike.',
            'landmark' => 'Tanger Outlets & Locust Grove Village',
        ],

        /* ---- CLAYTON COUNTY ---- */
        'jonesboro' => [
            'headline' => 'Scarlett Would Approve — Old-Fashioned Service in Jonesboro',
            'story'    => 'As the inspiration for Tara in Gone With the Wind, Jonesboro carries a weight of Georgia history that few places can match. The Road to Tara Museum, the historic homes, the sense of deep Southern roots — it\'s all here. We\'ve been honored to work on properties throughout Jonesboro, from classic older homes near the historic district to neighborhoods that have grown up around the legacy. We bring the same old-fashioned values to every job: show up, work hard, clean up, charge fair.',
            'landmark' => 'Road to Tara Museum & Historic Jonesboro',
        ],
        'morrow' => [
            'headline' => 'Reliable Septic Service for Morrow Homeowners',
            'story'    => 'Morrow sits at a crossroads — convenient, connected, and community-minded. The proximity to Southlake Mall and the Clayton County International Park makes it one of the most livable spots in the county. We\'ve worked on homes and commercial properties throughout Morrow and always find a neighborhood that takes pride in how it looks and how it functions.',
            'landmark' => 'Southlake Mall & Clayton County International Park',
        ],
        'forest-park' => [
            'headline' => 'Forest Park: Working-Class Pride, Quality Service',
            'story'    => 'Forest Park is a city that works hard and expects the same from everyone it hires. The Farmers Market has been a cornerstone of the regional food supply for decades, and the people who live here have that same steady, reliable character. When you call Davis Southern Septic for service in Forest Park, you get the same honest, no-nonsense approach you\'d expect from a neighbor.',
            'landmark' => 'Atlanta State Farmers Market',
        ],

        /* ---- COWETA COUNTY ---- */
        'newnan' => [
            'headline' => 'The City of Homes — and We Help Keep Them Running',
            'story'    => 'Newnan has earned its reputation as one of Georgia\'s most beautiful cities. The antebellum homes downtown, College Street, Greenville Street — it\'s a city that takes preservation seriously. We\'ve worked on some of the oldest and most interesting septic systems in the region out here, and we always approach them with the care the properties deserve. Whether you\'re in a historic home or a new neighborhood off I-85, we treat your property like it matters — because it does.',
            'landmark' => 'Downtown Newnan Historic District & College Street',
        ],
        'sharpsburg' => [
            'headline' => 'Sharpsburg: Country Living Close to Everything',
            'story'    => 'Sharpsburg sits in that sweet spot between rural Georgia and the growing Atlanta metro — enough land to breathe, enough road to get anywhere you need to go. The properties here tend to be on larger lots with established septic systems, and we\'ve been out many times to keep those systems working for families who\'ve owned their land for generations. This is the kind of Georgia we\'re proud to serve.',
            'landmark' => 'Newnan-Coweta Countryside',
        ],
        'grantville' => [
            'headline' => 'Small Town, Big Heart — Grantville Deserves Great Service',
            'story'    => 'Grantville is one of those towns that the highway passes by, but the people who call it home wouldn\'t trade it for anything. It\'s quiet, it\'s genuine, and it\'s the kind of place where someone waves from a porch swing without knowing who you are. We love coming to Grantville. Every job here feels like a reminder of what this work is really about.',
            'landmark' => 'Historic Grantville Downtown',
        ],

        /* ---- FULTON COUNTY ---- */
        'atlanta' => [
            'headline' => 'Atlanta\'s South Side Septic Specialists',
            'story'    => 'Atlanta is always moving — but the neighborhoods in South Fulton that still run on septic systems are the ones that feel most like home. From properties near Chattahoochee Hills to older estates in the unincorporated areas, we\'ve seen it all. The city may be growing faster than anyone can track, but the fundamentals of a healthy septic system haven\'t changed, and neither has our commitment to getting it right every time.',
            'landmark' => 'South Fulton & Chattahoochee Hills',
        ],
        'fairburn' => [
            'headline' => 'Fairburn: Where Fulton County Stays Real',
            'story'    => 'Fairburn has resisted the pressure to become just another suburb, and there\'s something admirable about that. The old railroad history, the tight-knit neighborhoods, the people who know their neighbors by name — it has character. We\'ve been out to Fairburn on many calls, and the community always makes us feel welcome. We bring that same warmth to every job.',
            'landmark' => 'Historic Fairburn Downtown & Railroad Heritage',
        ],
        'union-city' => [
            'headline' => 'Union City Homeowners Can Count on Us',
            'story'    => 'Union City is growing, developing, and building a future — while maintaining the community bonds that have always defined it. We\'ve worked on septic systems throughout Union City, from established neighborhoods to newer developments off Camp Creek Parkway. Wherever you are in the city, we show up on time, do the work right, and leave your yard the way we found it.',
            'landmark' => 'Camp Creek Parkway Corridor',
        ],

        /* ---- DOUGLAS COUNTY ---- */
        'douglasville' => [
            'headline' => 'Douglasville\'s Favorite Septic Team',
            'story'    => 'We have spent a lot of time in Douglasville, and we\'ve come to love it. Chapel Hill Road has transformed into one of the best retail corridors in the western suburbs, but the older neighborhoods off Stewart Mill Road and Fairburn Road still have that Georgia charm that makes a house feel like a home. We\'ve pumped tanks and installed systems all over Douglas County, and Douglasville homeowners always make our crews feel like part of the community.',
            'landmark' => 'Chapel Hill Road Corridor & Historic Douglasville Square',
        ],
        'villa-rica' => [
            'headline' => 'Villa Rica — Gold Mine History, Modern Septic Service',
            'story'    => 'Villa Rica has a history that most people don\'t know — it was a gold mining town long before Georgia\'s gold rush became famous. Today it\'s a fast-growing community straddling Douglas and Carroll Counties, with new neighborhoods going up alongside long-established homes. We love working out here. The people are salt-of-the-earth and the properties are spread across some of the most beautiful land in the region.',
            'landmark' => 'Historic Gold Mining Heritage & Mirror Lake',
        ],
        'lithia-springs' => [
            'headline' => 'Lithia Springs: Easy Access, Rock-Solid Septic Service',
            'story'    => 'Right off I-20, Lithia Springs is one of those communities that balances convenience with neighborhood character. The older subdivisions tucked off Bankhead Highway have been there for decades, and the septic systems in some of those homes need the kind of experienced eye that only comes from years in the field. We know this area well and are always glad to make the trip.',
            'landmark' => 'I-20 Corridor & Sweetwater Creek State Park',
        ],

        /* ---- GWINNETT COUNTY ---- */
        'lawrenceville' => [
            'headline' => 'Lawrenceville — Gwinnett\'s Heart, Our Home Base',
            'story'    => 'Lawrenceville is a city we know well — the historic courthouse, the downtown square that has come back to life in recent years, the neighborhoods that stretch out in every direction from the center. Gwinnett County\'s oldest city has the kind of depth that comes from nearly 200 years of growth, and the septic systems out here tell that story in rings. We\'ve worked on everything from 50-year-old concrete tanks to brand-new systems going in on new construction, and we love every bit of it.',
            'landmark' => 'Lawrenceville Historic Courthouse Square',
        ],
        'snellville' => [
            'headline' => '"That\'s My Town" — Snellville Septic Service Done Right',
            'story'    => 'Snellville has one of the most recognizable slogans in Georgia, and the town has always backed it up with a genuine community spirit. The neighborhoods off Scenic Highway and Ronald Reagan Parkway are established, well-maintained, and full of homeowners who take pride in their properties. When we come to Snellville for a service call, we feel that same pride in the work we do.',
            'landmark' => 'Briscoe Park & Scenic Highway',
        ],
        'buford' => [
            'headline' => 'From Lake Lanier Shores to New Subdivisions — We Serve All of Buford',
            'story'    => 'Buford has two personalities — the lakefront community of long-time Georgia families who\'ve kept their places on Lake Lanier for generations, and the fast-growing new Buford that has exploded with development off I-985. We serve both equally well. Lake property systems need experienced hands, and new construction needs code-compliant installation done right the first time. Either way, Buford gets our best.',
            'landmark' => 'Lake Lanier & Mall of Georgia',
        ],
        'duluth' => [
            'headline' => 'Duluth: Multicultural, Growing, and Well-Served',
            'story'    => 'Duluth may be one of the most internationally diverse cities in all of Georgia, and we love that about it. The growth along Pleasant Hill Road and around Sugarloaf Parkway has been remarkable. Homeowners here come from every background and every walk of life, but they all share one thing — they want reliable service from people who treat them with respect. That is exactly what we bring every time.',
            'landmark' => 'Sugarloaf Parkway & Downtown Duluth',
        ],

        /* ---- FORSYTH COUNTY ---- */
        'cumming' => [
            'headline' => 'We Love Coming to Cumming — Especially During Fair Season',
            'story'    => 'There is something genuinely exciting about rolling into Cumming in October when the Cumming Country Fair and Festival is in full swing. The smell of funnel cake, the Ferris wheel over the fairgrounds, the whole town buzzing with energy — it\'s one of those Georgia traditions that never gets old. We\'ve been servicing Forsyth County properties for years, and Cumming homeowners have always been some of our most loyal customers. Whether it\'s a lakefront property near Lake Lanier or a newer home in one of the growing subdivisions, we take care of it like it\'s our own.',
            'landmark' => 'Cumming Country Fair & Festival and Lake Lanier',
        ],
        'coal-mountain' => [
            'headline' => 'Coal Mountain: Where North Forsyth Stays Grounded',
            'story'    => 'Coal Mountain is the kind of North Forsyth community where the land still breathes. Large parcels, wooded lots, and the quieter pace of life that people come to Forsyth County specifically to find. Septic systems are the backbone of daily life out here, and we treat every service call with the seriousness that reflects. We have been out many times and always appreciate the peace and the people.',
            'landmark' => 'North Forsyth Countryside',
        ],

        /* ---- CHEROKEE COUNTY ---- */
        'canton' => [
            'headline' => 'Canton: From the Mill District to the Mountains, We\'re Here',
            'story'    => 'Canton has undergone one of the most impressive transformations of any city in metro Atlanta. The revitalized downtown, the old mill district that has become a destination, the proximity to the Blue Ridge foothills — Canton has found its identity and it\'s a good one. We\'ve worked all over Cherokee County from Canton, and the mix of historic properties and new construction keeps our crew sharp. Every time we drive past the Etowah River, we appreciate what a special part of Georgia this is.',
            'landmark' => 'Canton Downtown & Etowah River',
        ],
        'woodstock' => [
            'headline' => 'Woodstock Families Trust Davis Southern Septic',
            'story'    => 'Woodstock has earned its place as one of the most desirable cities in the Atlanta metro. The downtown music scene, the trail system, the balanced mix of families and young professionals — it all adds up to a city that people choose intentionally. We\'ve been part of Woodstock\'s growth for years, installing systems in new developments and maintaining older ones in established neighborhoods. Whatever your property needs, we bring the same care that Woodstock homeowners have come to expect.',
            'landmark' => 'Woodstock Downtown Entertainment District & Greenprints Trails',
        ],
        'ball-ground' => [
            'headline' => 'Ball Ground: Where Small-Town Georgia Still Lives',
            'story'    => 'Ball Ground is one of those Cherokee County gems that most people outside the area have never heard of — and the people who live there are perfectly fine with that. The antique shops, the community events, the way neighbors look after each other — it\'s the Georgia we all grew up hearing about. We love coming to Ball Ground. The properties out here are diverse and interesting, and the community makes every visit worthwhile.',
            'landmark' => 'Ball Ground Historic Downtown & Antique District',
        ],
        'holly-springs' => [
            'headline' => 'Holly Springs Is Growing Fast — We\'re Ready',
            'story'    => 'Holly Springs has been one of Cherokee County\'s fastest-growing cities, and it\'s not hard to see why. Great schools, family-friendly neighborhoods, easy access to Canton and Woodstock — it checks every box. New septic installations are a big part of what we do out here as the city builds out, and we take every one seriously. A system installed right today saves a homeowner thousands down the road.',
            'landmark' => 'Holly Springs City Park & Cherokee County Schools',
        ],
        'waleska' => [
            'headline' => 'Waleska: Mountain Air and Reliable Septic Service',
            'story'    => 'Tucked up against the southern foothills, Waleska feels like a different Georgia entirely. Reinhardt University gives it an unexpected energy, and the mountain setting makes it one of the most scenic places we visit. Out here, properties tend to be on hillside terrain that requires real expertise in system design and maintenance. We bring both, and we always leave a little time to appreciate the view.',
            'landmark' => 'Reinhardt University & Ball Mountain',
        ],
    ];
}

/* ================================================================
   HELPER FUNCTIONS
================================================================ */
function dss_city_slug($city) {
    return strtolower(preg_replace('/[^a-z0-9]+/i', '-', trim($city)));
}

function dss_get_city_content($city_slug) {
    $data = dss_get_city_personality();
    return isset($data[$city_slug]) ? $data[$city_slug] : null;
}

/* Blog helpers kept for back-compat but blog pages removed */
function dss_get_blog_posts()        { return []; }
function dss_get_post_by_slug($slug) { return null; }
