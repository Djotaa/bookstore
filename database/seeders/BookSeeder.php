<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = Book::create([
            'book_name'=>'The Haunting of Hill House',
            'price'=>14,
            'description'=>'First published in 1959, Shirley Jackson\'s The Haunting of Hill House has been hailed as a perfect work of unnerving terror. It is the story of four seekers who arrive at a notoriously unfriendly pile called Hill House: Dr. Montague, an occult scholar looking for solid evidence of a "haunting"; Theodora, his lighthearted assistant; Eleanor, a friendless, fragile young woman well acquainted with poltergeists; and Luke, the future heir of Hill House. At first, their stay seems destined to be merely a spooky encounter with inexplicable phenomena. But Hill House is gathering its powers—and soon it will choose one of them to make its own.',
            'image'=>'the_haunting_of_hill_house.jpg',
            'publish_year'=>'2006',
            'genre_id'=>1
        ]);

        $author = Author::firstOrCreate(['name'=>'Shirley Jackson']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>"Gwendy's Final Task",
            'price'=>9,
            'description'=>'When Gwendy Peterson was twelve, a mysterious stranger named Richard Farris gave her a mysterious box for safekeeping. It offered treats and vintage coins, but it was dangerous. Pushing any of its seven colored buttons promised death and destruction. Years later, the button box entered Gwendy\'s life again. A successful novelist and a rising political star, she was once again forced to deal with the temptation that box represented. Now, evil forces seek to possess the button box and it is up to Senator Gwendy Peterson to keep it from them. At all costs. But where can you hide something from such powerful entities? In Gwendy\'s Final Task, "horror giants" Stephen King and Richard Chizmar take us on a journey from Castle Rock to another famous cursed Maine city to the MF-1 space station, where Gwendy must execute a secret mission to save the world. And, maybe, all worlds.',
            'image'=>"gwendy's_final_task.jpg",
            'publish_year'=>'2022',
            'genre_id'=>1
        ]);

        $author = Author::firstOrCreate(['name'=>'Stephen King']);
        $author2 = Author::firstOrCreate(['name'=>'Richard Chizmar']);
        $book->authors()->sync([$author->id,$author2->id]);


        $book = Book::create([
            'book_name'=>'Frankenstein',
            'price'=>15,
            'description'=>'Stepping far afield from his medical studies, Victor Frankenstein brings to life a human form he has fashioned from scavenged body parts. Horrified by his achievement, he turns his back on his creation, only to learn the danger of such neglect. Written when Mary Shelley was only 20 years old, Frankenstein has been hailed as both a landmark of Gothic horror fiction and the first modern science fiction story.',
            'image'=>'frankenstein.jpg',
            'publish_year'=>'2015',
            'genre_id'=>1
        ]);

        $author = Author::firstOrCreate(['name'=>'Mary Shelley']);
        $book->authors()->sync($author->id);


        $book = Book::create([
            'book_name'=>'The Picture of Dorian Gray',
            'price'=>15,
            'description'=>'Horror hides behind an attractive face in The Picture of Dorian Gray, Oscar Wilde\'s tale of a notorious Victorian libertine and his life of evil excesses. Though Dorian\'s hedonistic indulgences leave no blemish on his ageless features, the painted portrait imbued with his soul proves a living catalogue of corruption, revealing in its every new line and lesion the manifold sins he has committed. Desperate to hide the physical evidence of his unregenerate spirit, Dorian will stop at nothing—not even murder—to keep his picture\'s existence a secret.',
            'image'=>'the_picture_of_dorian_gray.jpg',
            'publish_year'=>'2015',
            'genre_id'=>1
        ]);

        $author = Author::firstOrCreate(['name'=>'Oscar Wilde']);
        $book->authors()->sync($author->id);


        $book = Book::create([
            'book_name'=>'The Only Good Indians',
            'price'=>13,
            'description'=>'At the crossroads of horror, poetry and history sits The Only Good Indians. These three paths might seem inconceivable considering the first road mentioned. No talk here of what will keep you up at night. “Poetic” should be called out in Jones’ writing. He gives distinct voice to his four main characters. You will forever hear their stories in your mind, long after turning the last page. And in those stories is a deep history of Native American culture. Sometimes the true horror in a story goes beyond the passages that keep you up at night. First rate all around for this novel.',
            'image'=>'the_only_good_indians.jpg',
            'publish_year'=>'2021',
            'genre_id'=>1
        ]);

        $author = Author::firstOrCreate(['name'=>'Stephen Graham Jones']);
        $book->authors()->sync($author->id);


        $book = Book::create([
            'book_name'=>'The Shining',
            'price'=>16,
            'description'=>'Jack Torrance’s new job at the Overlook Hotel is the perfect chance for a fresh start. As the off-season caretaker at the atmospheric old hotel, he’ll have plenty of time to spend reconnecting with his family and working on his writing. But as the harsh winter weather sets in, the idyllic location feels ever more remote . . . and more sinister. And the only one to notice the strange and terrible forces gathering around the Overlook is Danny Torrance, a uniquely gifted five-year-old.',
            'image'=>'the_shining.jpg',
            'publish_year'=>'2013',
            'genre_id'=>1
        ]);

        $author = Author::firstOrCreate(['name'=>'Stephen King']);
        $book->authors()->sync($author->id);


        $book = Book::create([
            'book_name'=>'Edgar Allan Poe: Classic Stories',
            'price'=>11,
            'description'=>'Edgar Allan Poe was a master of the tale of psychological horror and the author of what is considered the first modern detective story. This anthology gathers more than 20 of Poe’s groundbreaking tales of the macabre, among them “The Tell-Tale Heart,” “The Masque of the Red Death,” and “The Fall of the House of Usher.” It also includes his trilogy of stories featuring detective C. Auguste Dupin: “The Murders in the Rue Morgue,” “The Mystery of Marie Rôget,” and “The Purloined Letter.”',
            'image'=>'edgar_allan_poe_classic_stories.jpg',
            'publish_year'=>'2018',
            'genre_id'=>1
        ]);

        $author = Author::firstOrCreate(['name'=>'Edgar Allan Poe']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'How the Grinch Stole Christmas!',
            'price'=>17,
            'description'=>'Grow your heart three sizes and get in on all of the Grinch-mas cheer with this Christmas classic—the ultimate Dr. Seuss holiday book that no collection is complete without! Every Who down in Who-ville liked Christmas a lot . . . but the Grinch, who lived just north of Who-ville, did NOT! Not since "\'Twas the night before Christmas" has the beginning of a Christmas tale been so instantly recognizable. This heartwarming story about the effects of the Christmas spirit will grow even the coldest and smallest of hearts. Like mistletoe, candy canes, and caroling, the Grinch is a mainstay of the holidays, and his story is the perfect gift for readers young and old.',
            'image'=>'how_the_grinch_stole_christmas!.jpg',
            'publish_year'=>'2021',
            'genre_id'=>11
        ]);

        $author = Author::firstOrCreate(['name'=>'Dr. Seuss']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'The Lorax',
            'price'=>8,
            'description'=>'I am the Lorax. I speak for the trees. Dr. Seuss’s beloved story teaches kids to treat the planet with kindness and stand up and speak up for others. Experience the beauty of the Truffula Trees and the danger of taking our earth for granted in a story that is timely, playful, and hopeful. The book’s final pages teach us that just one small seed, or one small child, can make a difference. Printed on recycled paper, this book is the perfect gift for Earth Day and for any child—or child at heart—who is interested in recycling, advocacy, and the environment, or just loves nature and playing outside. Unless someone like you cares a whole awful lot, nothing is going to get better. It’s not.',
            'image'=>'the_lorax.jpg',
            'publish_year'=>'1971',
            'genre_id'=>11
        ]);

        $author = Author::firstOrCreate(['name'=>'Dr. Seuss']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Barnyard Dance!',
            'price'=>7,
            'description'=>'Everybody sing along—because it\'s time to do-si-do in the barnyard with a high-spirited animal crew! From Boynton on Board, the bestselling series of board books, here is BARNYARD DANCE, with Sandra Boynton\'s twirling pigs, fiddle-playing cows, and other unforgettable animals. Extra-big, extra-fat, and extra-fun, BARNYARD DANCE features lively rhyming text and a die-cut cover that reveals the wacky characters inside. Guaranteed to get kids and adults stomping their feet.',
            'image'=>'barnyard_dance!.jpg',
            'publish_year'=>'1993',
            'genre_id'=>11
        ]);

        $author = Author::firstOrCreate(['name'=>'Sandra Boynton']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Wingbearer',
            'price'=>9,
            'description'=>'Zuli is extraordinary—she just doesn’t realize it yet. Raised by mystical bird spirits in the branches of the Great Tree, she’s never ventured beyond this safe haven. She’s never had to. Until now. When a sinister force threatens the life-giving magic of the tree, Zuli, along with her guardian owl, Frowly, must get to the root of it. So begins an adventure bigger than anything Zuli could’ve ever imagined—one that will bring her, along with some newfound friends, face-to-face with an ancient dragon, the so-called Witch-Queen, and most surprisingly of all: her true identity.',
            'image'=>'wingbearer.jpg',
            'publish_year'=>'2022',
            'genre_id'=>11
        ]);

        $author = Author::firstOrCreate(['name'=>'Marjorie Liu']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'The Tale of Peter Rabbit',
            'price'=>5,
            'description'=>'Once upon a time there were four little Rabbits, and their names were — Flopsy, Mopsy, Cotton-tail, and Peter. The text and illustrations of the classic Tale of Peter Rabbit, loved by children around the world for generations, appear in full. Large, easy-to-read text makes this perfect for storytime and bedtime, and the classic story is sure to be a favorite.',
            'image'=>'the_tale_of_peter_rabbit.jpg',
            'publish_year'=>'2004',
            'genre_id'=>11
        ]);

        $author = Author::firstOrCreate(['name'=>'Beatrix Potter']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Happy Easter, Biscuit!',
            'price'=>6,
            'description'=>'Hippity, hoppity...woof! Join Biscuit on an Easter adventure, with flaps for your little egg hunters to lift! Biscuit\'s first Easter egg hunt is going to be egg-stra special. Where are all the eggs hidden? Your little pup will enjoy lifting the flaps to find the eggs! Happy Easter, Biscuit! is a fun Easter basket and springtime gift. Biscuit and the little girl have been warmly embraced by families for 25 years. Author Alyssa Satin Capucilli reflects: "It is my childhood dream of having a dog, perhaps a somewhat universal dream, that fuels the emotional life of the young child that cares so lovingly for Biscuit. And knowing that the fluid imagination of a child believes a beloved pet can understand every word spoken to them, the words \'woof, woof\' not only become the voice of a small yellow puppy, but of every reader’s invention as well."',
            'image'=>'happy_easter,_biscuit!.jpg',
            'publish_year'=>'2020',
            'genre_id'=>11
        ]);

        $author = Author::firstOrCreate(['name'=>'Alyssa Satin Capucilli']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Pieces of Her',
            'price'=>10,
            'description'=>'What if the person you thought you knew best turns out to be someone you never knew at all . . . ? Andrea Cooper knows everything about her mother Laura. She’s knows she’s spent her whole life in the small beachside town of Gullaway Island; she knows she’s never wanted anything more than to live a quiet life as a pillar of the community; she knows she’s never kept a secret in her life. Because we all know our mothers, don’t we? But all that changes when a Saturday afternoon trip to the mall explodes into violence and Andrea suddenly sees a completely different side to Laura. Because it turns out that before Laura was Laura, she was someone completely different. For nearly thirty years she’s been hiding from her previous identity, lying low in the hope that no one will ever find her. But now she’s been exposed, and nothing will ever be the same again. Twenty-four hours later Laura is in the hospital, shot by an intruder who’s spent thirty years trying to track her down and discover what she knows. Andrea is on a desperate journey following the breadcrumbs of her mother’s past. And if she can’t uncover the secrets hidden there, there may be no future for either one of them. . . .',
            'image'=>'pieces_of_her.jpg',
            'publish_year'=>'2018',
            'genre_id'=>21
        ]);

        $author = Author::firstOrCreate(['name'=>'Karin Slaughter']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'A Reference to Murder',
            'price'=>8,
            'description'=>'Charli Rae Warren is back home in Hazel Rock, Texas, spending her time reading, collecting, and selling books—at least, the ones that don’t get eaten first by her father’s pet armadillo. Running the family bookstore is a demanding job, but solving murders on the side can be flat out dangerous . . . The Book Barn is more than just a shop, it’s a part of the community—and Charli is keeping busy with a fundraising auction and the big rodeo event that’s come to town. That includes dealing with the Texas-sized egos of some celebrity cowboys, including Dalton Hibbs, a blond, blue-eyed bull rider who gets overly rowdy one night with the local hairdresser . . . and soon afterward, disappears into thin air. Dalton’s brother also vanished seven years ago—and Charli is thrown about whether Dalton is a villain or a victim. After a close call with an assailant wielding a branding iron (that plays havoc with her hair), and some strange vandalism on her property, she’s going to have to team up with the sheriff to untangle this mystery, before she gets gored . . .',
            'image'=>'a_reference_to_murder.jpg',
            'publish_year'=>'2017',
            'genre_id'=>21
        ]);

        $author = Author::firstOrCreate(['name'=>'Kym Roberts']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'And Then There Were None',
            'price'=>3,
            'description'=>'Ten people, each with something to hide and something to fear, are invited to a isolated mansion on Indian Island by a host who, surprisingly, fails to appear. On the island they are cut off from everything but each other and the inescapable shadows of their own past lives. One by one, the guests share the darkest secrets of their wicked pasts. And one by one, they die… Which among them is the killer and will any of them survive?',
            'image'=>'and_then_there_were_none.jpg',
            'publish_year'=>'2009',
            'genre_id'=>21
        ]);

        $author = Author::firstOrCreate(['name'=>'Agatha Cristie']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>"Cain's Jawbone",
            'price'=>8,
            'description'=>'Six murders. One hundred pages. Millions of possible combinations… but only one is correct. Can you solve Torquemada’s murder mystery? In 1934, the Observer’s cryptic crossword compiler, Edward Powys Mathers (aka Torquemada), released a novel that was simultaneously a murder mystery and the most fiendishly difficult literary puzzle ever written. The pages have been printed in an entirely haphazard order, but it is possible – through logic and intelligent reading – to sort the pages into the only correct order, revealing six murder victims and their respective murderers. Only three puzzlers have ever solved the mystery of Cain’s Jawbone: do you have what it takes to join their ranks? Please note: this puzzle is extremely difficult and not for the faint-hearted.',
            'image'=>"cain's_jawbone.jpg",
            'publish_year'=>'2021',
            'genre_id'=>21
        ]);

        $author = Author::firstOrCreate(['name'=>'Edward Powys Mathers']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'City Problems',
            'price'=>15,
            'description'=>'A moment of violence—a snap judgement—a life changed to the core. Ed Runyon bolted from the NYPD after a runaway teen case fell through the cracks and turned into a nightmarish murder. Now, he\'s learned to bury the rage that consumed him, cope with depression, and enjoy life as a Mifflin County sheriff\'s detective in rural Ohio. Ed is trying to relax on his day off when Columbus PD Detective Shelly Beckworth comes to Mifflin County in search of a girl who vanished after a pop-up party. The clues are scarce—a few license plates, a phone shattered on the roadside—but the trail leads to Ed\'s neck of the woods. He tries to shove everything else aside to keep this case from ending in another tragedy, but a cop can\'t pick and choose which calls to duty he\'ll answer. Frustrated, Ed watches a happy ending slip beyond sight—this one he cannot run away from. Charging forward, Ed breaks rules and takes risks leading to a bloody confrontation where everything he believes as a cop and every ghost in his head clash—a moment of avenging violence that will ultimately change his life to the core.',
            'image'=>'city_problems.jpg',
            'publish_year'=>'2021',
            'genre_id'=>21
        ]);

        $author = Author::firstOrCreate(['name'=>'Steve Goble']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'The Maid',
            'price'=>13,
            'description'=>'Molly Gray is not like everyone else. She struggles with social skills and misreads the intentions of others. Her gran used to interpret the world for her, codifying it into simple rules that Molly could live by. Since Gran died a few months ago, twenty-five-year-old Molly has been navigating life’s complexities all by herself. No matter—she throws herself with gusto into her work as a hotel maid. Her unique character, along with her obsessive love of cleaning and proper etiquette, make her an ideal fit for the job. She delights in donning her crisp uniform each morning, stocking her cart with miniature soaps and bottles, and returning guest rooms at the Regency Grand Hotel to a state of perfection. But Molly’s orderly life is upended the day she enters the suite of the infamous and wealthy Charles Black, only to find it in a state of disarray and Mr. Black himself dead in his bed. Before she knows what’s happening, Molly’s unusual demeanor has the police targeting her as their lead suspect. She quickly finds herself caught in a web of deception, one she has no idea how to untangle. Fortunately for Molly, friends she never knew she had unite with her in a search for clues to what really happened to Mr. Black—but will they be able to find the real killer before it’s too late? A Clue-like, locked-room mystery and a heartwarming journey of the spirit, The Maid explores what it means to be the same as everyone else and yet entirely different—and reveals that all mysteries can be solved through connection to the human heart.',
            'image'=>'the_maid.jpg',
            'publish_year'=>'2022',
            'genre_id'=>21
        ]);

        $author = Author::firstOrCreate(['name'=>'Nita Prose']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'The Illiad & The Odyssey',
            'price'=>20,
            'description'=>'A classic keepsake for fans of Greek mythology, as well as all great literature, this collection is the perfect addition to any library. The influence of these two works can be seen far and wide, from James Joyce\'s Ulysses to the movie sensation Troy, starring Brad Pitt.',
            'image'=>'the_illiad_&_the_odyssey.jpg',
            'publish_year'=>'2016',
            'genre_id'=>31
        ]);

        $author = Author::firstOrCreate(['name'=>'Homer']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'The Rose That Grew From Concrete',
            'price'=>14,
            'description'=>'Tupac Shakur\'s most intimate and honest thoughts were uncovered only after his death with the instant classic The Rose That Grew from Concrete. His talent was unbounded a raw force that commanded attention and respect. His death was tragic—a violent homage to the power of his voice. His legacy is indomitable—as vibrant and alive today as it has ever been. For the first time in paperback, this collection of deeply personal poetry is a mirror into the legendary artist\'s enigmatic world and its many contradictions. Written in his own hand from the time he was nineteen, these seventy-two poems embrace his spirit, his energy—and his ultimate message of hope.',
            'image'=>'the_rose_that_grew_from_concrete.jpg',
            'publish_year'=>'2009',
            'genre_id'=>31
        ]);

        $author = Author::firstOrCreate(['name'=>'Tupac Shakur']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Call Us What We Carry',
            'price'=>21,
            'description'=>'Formerly titled The Hill We Climb and Other Poems, the luminous poetry collection by #1 New York Times bestselling author and presidential inaugural poet Amanda Gorman captures a shipwrecked moment in time and transforms it into a lyric of hope and healing. In Call Us What We Carry, Gorman explores history, language, identity, and erasure through an imaginative and intimate collage. Harnessing the collective grief of a global pandemic, this beautifully designed volume features poems in many inventive styles and structures and shines a light on a moment of reckoning. Call Us What We Carry reveals that Gorman has become our messenger from the past, our voice for the future.',
            'image'=>'call_us_what_we_carry.jpg',
            'publish_year'=>'2021',
            'genre_id'=>31
        ]);

        $author = Author::firstOrCreate(['name'=>'Amanda Gorman']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Pillow Thoughts',
            'price'=>15,
            'description'=>'Make a cup of tea and let yourself feel. Pillow Thoughts is a collection of poetry and prose about heartbreak, love, and raw emotions. It is divided into sections to read when you feel you need them most.',
            'image'=>'pillow_thoughts.jpg',
            'publish_year'=>'',
            'genre_id'=>31
        ]);

        $author = Author::firstOrCreate(['name'=>'Courtney Peppernell']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Milk and Honey',
            'price'=>12,
            'description'=>'The book is divided into four chapters, and each chapter serves a different purpose. Deals with a different pain. Heals a different heartache. milk and honey takes readers through a journey of the most bitter moments in life and finds sweetness in them because there is sweetness everywhere if you are just willing to look.',
            'image'=>'milk_and_honey.jpg',
            'publish_year'=>'2015',
            'genre_id'=>31
        ]);

        $author = Author::firstOrCreate(['name'=>'Rupi Kaur']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Home Body',
            'price'=>16,
            'description'=>'There is no one who knows the power of the written and spoken word better than Rupi Kaur. In Home Body, Kaur\'s poems are compact. Each one, however, is full of the exact right words. Words that help. Words that heal. Kaur\'s accompanying illustrations add to the sensitivity of the material. Line drawings as delicate as the poems. Combined with the poems, they create a strength. By going so deep into life\'s experience, Kaur shows us how to resurface the strength we always knew we had. This book is one of the bravest works of poetry you will ever encounter.',
            'image'=>'home_body.jpg',
            'publish_year'=>'2020',
            'genre_id'=>31
        ]);

        $author = Author::firstOrCreate(['name'=>'Rupi Kaur']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>"What If It's Us",
            'price'=>11,
            'description'=>'Critically acclaimed and bestselling authors Becky Albertalli and Adam Silvera combine their talents in this smart, funny, heartfelt collaboration about two very different boys who can’t decide if the universe is pushing them together—or pulling them apart. ARTHUR is only in New York for the summer, but if Broadway has taught him anything, it’s that the universe can deliver a showstopping romance when you least expect it. BEN thinks the universe needs to mind its business. If the universe had his back, he wouldn’t be on his way to the post office carrying a box of his ex-boyfriend’s things. But when Arthur and Ben meet-cute at the post office, what exactly does the universe have in store for them . . . ?',
            'image'=>"what_if_it's_us.jpg",
            'publish_year'=>'2020',
            'genre_id'=>41
        ]);

        $author = Author::firstOrCreate(['name'=>'Becky Albertalli']);
        $author2 = Author::firstOrCreate(['name'=>'Adam Silvera']);
        $book->authors()->sync([$author->id,$author2->id]);

        $book = Book::create([
            'book_name'=>'The Love Hypothesis',
            'price'=>12,
            'description'=>'When a fake relationship between scientists meets the irresistible force of attraction, it throws one woman\'s carefully calculated theories on love into chaos. As a third-year Ph.D. candidate, Olive Smith doesn\'t believe in lasting romantic relationships—but her best friend does, and that\'s what got her into this situation. Convincing Anh that Olive is dating and well on her way to a happily ever after was always going to take more than hand-wavy Jedi mind tricks: Scientists require proof. So, like any self-respecting biologist, Olive panics and kisses the first man she sees. That man is none other than Adam Carlsen, a young hotshot professor—and well-known ass. Which is why Olive is positively floored when Stanford\'s reigning lab tyrant agrees to keep her charade a secret and be her fake boyfriend. But when a big science conference goes haywire, putting Olive\'s career on the Bunsen burner, Adam surprises her again with his unyielding support and even more unyielding...six-pack abs. Suddenly their little experiment feels dangerously close to combustion. And Olive discovers that the only thing more complicated than a hypothesis on love is putting her own heart under the microscope.',
            'image'=>'the_love_hypothesis.jpg',
            'publish_year'=>'2021',
            'genre_id'=>41
        ]);

        $author = Author::firstOrCreate(['name'=>'Ali Hazelwood']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Hook, Line, and Sinker',
            'price'=>12,
            'description'=>'King crab fisherman Fox Thornton has a reputation as a sexy, carefree flirt. Everyone knows he’s a guaranteed good time—in bed and out—and that’s exactly how he prefers it. Until he meets Hannah Bellinger. She’s immune to his charm and looks, but she seems to enjoy his… personality? And wants to be friends? Bizarre. But he likes her too much to risk a fling, so platonic pals it is. Now, Hannah\'s in town for work, crashing in Fox\’s spare bedroom. She knows he\’s a notorious ladies\’ man, but they\’re definitely just friends. In fact, she\'s nursing a hopeless crush on a colleague and Fox is just the person to help with her lackluster love life. Armed with a few tips from Westport’s resident Casanova, Hannah sets out to catch her coworker’s eye… yet the more time she spends with Fox, the more she wants him instead. As the line between friendship and flirtation begins to blur, Hannah can\'t deny she loves everything about Fox, but she refuses to be another notch on his bedpost. Living with his best friend should have been easy. Except now she’s walking around in a towel, sleeping right across the hall, and Fox is fantasizing about waking up next to her for the rest of his life and… and… man overboard! He\’s fallen for her, hook, line, and sinker. Helping her flirt with another guy is pure torture, but maybe if Fox can tackle his inner demons and show Hannah he’s all in, she\'ll choose him instead?',
            'image'=>'hook,_line,_and_sinker.jpg',
            'publish_year'=>'2022',
            'genre_id'=>41
        ]);

        $author = Author::firstOrCreate(['name'=>'Tessa Bailey']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'A Will and a Way',
            'price'=>7,
            'description'=>'When her beloved Uncle Jolley died, Pandora McVie couldn’t imagine her life without him—only to discover that he planned for her future by leaving her $150 million. But to collect her inheritance, Pandora must spend six months in her uncle’s isolated Catskills mansion with her co-beneficiary, Michael Donohue. If being set up on a half-year date that lasts through Christmas by a last will and testament isn’t humiliating enough, Pandora finds living with Michael intolerable—even as she falls in love with him…',
            'image'=>'a_will_and_a_way.jpg',
            'publish_year'=>'2022',
            'genre_id'=>41
        ]);

        $author = Author::firstOrCreate(['name'=>'Nora Roberts']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'A Touch of Darkness',
            'price'=>17,
            'description'=>'First book of Hadex x Persephone series. Persephone is the Goddess of Spring by title only. The truth is, since she was a little girl, flowers have shriveled at her touch. After moving to New Athens, she hopes to lead an unassuming life disguised as a mortal journalist. Hades, God of the Dead, has built a gambling empire in the mortal world and his favorite bets are rumored to be impossible. After a chance encounter with Hades, Persephone finds herself in a contract with the God of the Dead and the terms are impossible: Persephone must create life in the Underworld or lose her freedom forever. The bet does more than expose Persephone\'s failure as a goddess, however. As she struggles to sow the seeds of her freedom, love for the God of the Dead grows-and it\'s forbidden.',
            'image'=>'a_touch_of_darkness.jpg',
            'publish_year'=>'2021',
            'genre_id'=>41
        ]);

        $author = Author::firstOrCreate(['name'=>'Scarlett St. Clair']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'A Touch of Ruin',
            'price'=>13,
            'description'=>'Second book of Hades x Persefone series. Persephone\'s relationship with Hades has gone public and the resulting media storm disrupts her normal life and threatens to expose her as the Goddess of Spring. Hades, God of the Dead, is burdened by a hellish past that everyone\'s eager to expose in an effort to warn Persephone away. Things only get worse when a horrible tragedy leaves Persephone\'s heart in ruin and Hades refusing to help. Desperate, she takes matters into her own hands, striking bargains with severe consequences. Faced with a side of Hades she never knew and crushing loss, Persephone wonders if she can truly become Hades\' queen.',
            'image'=>'a_touch_of_ruin.jpg',
            'publish_year'=>'2021',
            'genre_id'=>41
        ]);

        $author = Author::firstOrCreate(['name'=>'Scarlett St. Clair']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'A Touch of Malice',
            'price'=>15,
            'description'=>'Third book of Hades x Persefone series. Persephone and Hades are engaged. In retaliation, Demeter summons a snowstorm that cripples New Greece, and refuses to lift the blizzard unless her daughter calls off her engagement. When the Olympians intervene, Persephone finds her future in the hands of ancient gods, and they are divided. Do they allow Persephone to marry Hades and go to war with Demeter or prohibit their union and take up arms against the God of the Dead? Nothing is certain but the promise of war.',
            'image'=>'a_touch_of_malice.jpg',
            'publish_year'=>'2021',
            'genre_id'=>41
        ]);

        $author = Author::firstOrCreate(['name'=>'Scarlett St. Clair']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Dune',
            'price'=>9,
            'description'=>'Set on the desert planet Arrakis, Dune is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world where the only thing of value is the “spice” melange, a drug capable of extending life and enhancing consciousness. Coveted across the known universe, melange is a prize worth killing for.... When House Atreides is betrayed, the destruction of Paul’s family will set the boy on a journey toward a destiny greater than he could ever have imagined. And as he evolves into the mysterious man known as Muad’Dib, he will bring to fruition humankind’s most ancient and unattainable dream. A stunning blend of adventure and mysticism, environmentalism and politics, Dune won the first Nebula Award, shared the Hugo Award, and formed the basis of what is undoubtedly the grandest epic in science fiction.',
            'image'=>'dune.jpg',
            'publish_year'=>'2003',
            'genre_id'=>51
        ]);

        $author = Author::firstOrCreate(['name'=>'Frank Herbert']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>"Harry Potter and the Sorcerer's Stone",
            'price'=>11,
            'description'=>'Harry Potter spent ten long years living with Mr. and Mrs. Dursley, an aunt and uncle whose outrageous favoritism of their perfectly awful son Dudley leads to some of the most inspired dark comedy since Charlie and the Chocolate Factory. But fortunately for Harry, he\'s about to be granted a scholarship to a unique boarding school called THE HOGWARTS SCHOOL OF WITCHCRAFT AND WIZARDRY, where he will become a school hero at the game of Quidditch (a kind of aerial soccer played high above the ground on broomsticks), he will make some wonderful friends, and, unfortunately, a few terrible enemies. For although he seems to be getting your run-of-the-mill boarding school experience (well, ok, even that\'s pretty darn out of the ordinary), Harry Potter has a destiny that he was born to fulfill. A destiny that others would kill to keep him from.',
            'image'=>"harry_potter_and_the_sorcerer's_stone.jpg",
            'publish_year'=>'1998',
            'genre_id'=>51
        ]);

        $author = Author::firstOrCreate(['name'=>'J. K. Rowling']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Harry Potter and the Chamber of Secrets',
            'price'=>11,
            'description'=>'The Dursleys were so mean and hideous that summer that all Harry Potter wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he\'s packing his bags, Harry receives a warning from a strange, impish creature named Dobby who says that if Harry Potter returns to Hogwarts, disaster will strike. And strike it does. For in Harry\'s second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor, Gilderoy Lockhart, a spirit named Moaning Myrtle who haunts the girls\' bathroom, and the unwanted attentions of Ron Weasley\'s younger sister, Ginny. But each of these seem minor annoyances when the real trouble begins, and someone - or something - starts turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possibly be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects... Harry Potter himself!',
            'image'=>'harry_potter_and_the_chamber_of_secrets.jpg',
            'publish_year'=>'2000',
            'genre_id'=>51
        ]);

        $author = Author::firstOrCreate(['name'=>'J. K. Rowling']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Harry Potter and the Prisoner of Azkaban',
            'price'=>11,
            'description'=>'For twelve long years, the dread fortress of Azkaban held an infamous prisoner named Sirius Black. Convicted of killing thirteen people with a single curse, he was said to be the heir apparent to the Dark Lord, Voldemort.Now he has escaped, leaving only two clues as to where he might be headed: Harry Potter\'s defeat of You-Know-Who was Black\'s downfall as well. And the Azkaban guards heard Black muttering in his sleep, "He\'s at Hogwarts . . . he\'s at Hogwarts."Harry Potter isn\'t safe, not even within the walls of his magical school, surrounded by his friends. Because on top of it all, there may well be a traitor in their midst.',
            'image'=>'harry_potter_and_the_prisoner_of_azkaban.jpg',
            'publish_year'=>'2001',
            'genre_id'=>51
        ]);

        $author = Author::firstOrCreate(['name'=>'J. K. Rowling']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Harry Potter and the Goblet of Fire',
            'price'=>13,
            'description'=>'Harry Potter is midway through his training as a wizard and his coming of age. Harry wants to get away from the pernicious Dursleys and go to the International Quidditch Cup. He wants to find out about the mysterious event that\'s supposed to take place at Hogwarts this year, an event involving two other rival schools of magic, and a competition that hasn\'t happened for a hundred years. He wants to be a normal, fourteen-year-old wizard. But unfortunately for Harry Potter, he\'s not normal - even by wizarding standards. And in his case, different can be deadly.',
            'image'=>'harry_potter_and_the_goblet_of_fire.jpg',
            'publish_year'=>'2002',
            'genre_id'=>51
        ]);

        $author = Author::firstOrCreate(['name'=>'J. K. Rowling']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Harry Potter and the Order of the Phoenix',
            'price'=>13,
            'description'=>'The book that took the world by storm....In his fifth year at Hogwart\'s, Harry faces challenges at every turn, from the dark threat of He-Who-Must-Not-Be-Named and the unreliability of the government of the magical world to the rise of Ron Weasley as the keeper of the Gryffindor Quidditch Team. Along the way he learns about the strength of his friends, the fierceness of his enemies, and the meaning of sacrifice.',
            'image'=>'harry_potter_and_the_order_of_the_phoenix.jpg',
            'publish_year'=>'2004',
            'genre_id'=>51
        ]);

        $author = Author::firstOrCreate(['name'=>'J. K. Rowling']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Harry Potter and the Half-Blood Prince',
            'price'=>13,
            'description'=>'Lord Voldemort has returned to power, and his wrath has been felt in both the Muggle and Wizarding worlds. Severus Snape, long considered an enemy of Voldemort and a member of Dumbledore’s anti-Voldemort coalition, the Order of the Phoenix, meets with Narcissa Malfoy, mother of Draco and wife of Lucius, an imprisoned Death Eater. Snape makes an Unbreakable Vow to Narcissa, promising to protect her son, Draco. Dumbledore heads to 4 Privet Drive to collect Harry from his aunt and uncle. On their way to the Burrow, Harry and Dumbledore stop to recruit Horace Slughorn to return to teaching at Hogwarts. Harry is reunited with his best friends, Ron and Hermione. When shopping for schoolbooks, Harry runs into Draco and follows him to Borgin and Burkes, where he overhears Draco threatening Borgin and insisting that he fix an unknown object. Harry is instantly suspicious of Draco, whom he believes to be a Death Eater, just like his father. The students return to school, and Dumbledore announces that Snape will be teaching Defense Against the Dark Arts, much to Harry’s surprise.',
            'image'=>'harry_potter_and_the_half-blood_prince.jpg',
            'publish_year'=>'2006',
            'genre_id'=>51
        ]);

        $author = Author::firstOrCreate(['name'=>'J. K. Rowling']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Harry Potter and the Deathly Hallows',
            'price'=>15,
            'description'=>'At Malfoy Manor, Snape tells Voldemort the date that Harry’s friends are planning to move him from the house on Privet Drive to a new safe location, so that Voldemort can capture Harry en route. As Harry packs to leave Privet Drive, he reads two obituaries for Dumbledore, both of which make him think that he didn’t know Dumbledore as well as he should have. Downstairs, he bids good-bye to the Dursleys for the final time, as the threat of Voldemort forces them to go into hiding themselves. The Order of the Phoenix, led by Alastor “Mad-Eye” Moody, arrives to take Harry to his new home at the Weasleys’ house, the Burrow. Six of Harry’s friends take Polyjuice Potion to disguise themselves as Harry and act as decoys, and they all fly off in different directions. The Death Eaters, alerted to their departure by Snape, attack Harry and his friends. Voldemort chases Harry down, but Harry’s wand fends Voldemort off, seemingly without Harry’s help.',
            'image'=>'harry_potter_and_the_deathly_hallows.jpg',
            'publish_year'=>'2009',
            'genre_id'=>51
        ]);

        $author = Author::firstOrCreate(['name'=>'J. K. Rowling']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'The Fellowship of the Ring: The Lord of the Rings: Part One',
            'price'=>9,
            'description'=>'The opening novel of The Lord of the Rings—the greatest fantasy epic of all time—which continues in The Two Towers and The Return of the King. The dark, fearsome Ringwraiths are searching for a Hobbit. Frodo Baggins knows that they are seeking him and the Ring he bears—the Ring of Power that will enable evil Sauron to destroy all that is good in Middle-earth. Now it is up to Frodo and his faithful servant, Sam, with a small band of companions, to carry the Ring to the one place it can be destroyed: Mount Doom, in the very center of Sauron’s realm.',
            'image'=>'the_fellowship_of_the_ring_the_lord_of_the_rings_part_one.jpg',
            'publish_year'=>'1986',
            'genre_id'=>51
        ]);

        $author = Author::firstOrCreate(['name'=>'J. R. R. Tolkien']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'The Two Towers: The Lord of the Rings: Part Two',
            'price'=>9,
            'description'=>'The middle novel in The Lord of the Rings—the greatest fantasy epic of all time—which began in The Fellowship of the Ring, and which reaches its magnificent climax in The Return of the King. The Fellowship is scattered. Some brace hopelessly for war against the ancient evil of Sauron. Others must contend with the treachery of the wizard Saruman. Only Frodo and Sam are left to take the One Ring, ruler of the accursed Rings of Power, to be destroyed in Mordor, the dark realm where Sauron is supreme. Their guide is Gollum, deceitful and obsessive slave to the corruption of the Ring.',
            'image'=>'the_two_towers_the_lord_of_the_rings_part_two.jpg',
            'publish_year'=>'1986',
            'genre_id'=>51
        ]);

        $author = Author::firstOrCreate(['name'=>'J. R. R. Tolkien']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'The Return of The King: The Lord of the Rings: Part Three',
            'price'=>9,
            'description'=>'The awesome conclusion to The Lord of the Rings—the greatest fantasy epic of all time—which began in The Fellowship of the Ring and The Two Towers. While the evil might of the Dark Lord Sauron swarms out to conquer all Middle-earth, Frodo and Sam struggle deep into Mordor, seat of Sauron’s power. To defeat the Dark Lord, the One Ring, ruler of the accursed Rings of Power, must be destroyed in the fires of Mount Doom. But the way is impossibly hard, and Frodo is weakening. Weighed down by the compulsion of the Ring, he begins finally to despair.',
            'image'=>'the_return_of_the_king_the_lord_of_the_rings_part_three.jpg',
            'publish_year'=>'1986',
            'genre_id'=>51
        ]);

        $author = Author::firstOrCreate(['name'=>'J. R. R. Tolkien']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Verity',
            'price'=>17,
            'description'=>'Lowen Ashleigh is a struggling writer on the brink of financial ruin when she accepts the job offer of a lifetime. Jeremy Crawford, husband of bestselling author Verity Crawford, has hired Lowen to complete the remaining books in a successful series his injured wife is unable to finish. Lowen arrives at the Crawford home, ready to sort through years of Verity’s notes and outlines, hoping to find enough material to get her started. What Lowen doesn’t expect to uncover in the chaotic office is an unfinished autobiography Verity never intended for anyone to read. Page after page of bone-chilling admissions, including Verity\'s recollection of the night her family was forever altered. Lowen decides to keep the manuscript hidden from Jeremy, knowing its contents could devastate the already grieving father. But as Lowen\’s feelings for Jeremy begin to intensify, she recognizes all the ways she could benefit if he were to read his wife’s words. After all, no matter how devoted Jeremy is to his injured wife, a truth this horrifying would make it impossible for him to continue loving her.',
            'image'=>'verity.jpg',
            'publish_year'=>'2021',
            'genre_id'=>61
        ]);

        $author = Author::firstOrCreate(['name'=>'Colleen Hoover']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'The Overnight Guest',
            'price'=>18,
            'description'=>'True crime writer Wylie Lark doesn’t mind being snowed in at the isolated farmhouse where she’s retreated to write her new book. A cozy fire, complete silence. It would be perfect, if not for the fact that decades earlier, at this very house, two people were murdered in cold blood and a girl disappeared without a trace. As the storm worsens, Wylie finds herself trapped inside the house, haunted by the secrets contained within its walls—haunted by secrets of her own. Then she discovers a small child in the snow just outside. After bringing the child inside for warmth and safety, she begins to search for answers. But soon it becomes clear that the farmhouse isn’t as isolated as she thought, and someone is willing to do anything to find them.',
            'image'=>'the_overnight_guest.jpg',
            'publish_year'=>'2022',
            'genre_id'=>61
        ]);

        $author = Author::firstOrCreate(['name'=>'Heather Gudenkauf']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Cry Wolf',
            'price'=>14,
            'description'=>'A DEAD WOLF. A DRUG DEAL GONE WRONG. A LETHAL FEMALE ASSASSIN. The first book in a new series by Hans Rosenfeldt, creator of the TV series The Bridge as well as Netflix’s Emmy Award–winning Marcella. Hannah Wester, a policewoman in the remote northern town of Haparanda, Sweden, finds herself on the precipice of chaos. When human remains are found in the stomach of a dead wolf, Hannah knows that this summer won’t be like any other. The remains are linked to a bloody drug deal across the border in Finland. But how did the victim end up in the woods outside of Haparanda? And where have the drugs and money gone? Hannah and her colleagues leave no stone unturned. But time is scarce and they aren’t the only ones looking. When the secretive and deadly Katja arrives, unexpected and brutal events start to pile up. In just a few days, life in Haparanda is turned upside down. Not least for Hannah, who is finally forced to confront her own past.',
            'image'=>'cry_wolf.jpg',
            'publish_year'=>'2021',
            'genre_id'=>61
        ]);

        $author = Author::firstOrCreate(['name'=>'Hans Rosenfeldt']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'The Golden Couple',
            'price'=>15,
            'description'=>'Wealthy Washington suburbanites Marissa and Matthew Bishop seem to have it all—until Marissa is unfaithful. Beneath their veneer of perfection is a relationship riven by work and a lack of intimacy. She wants to repair things for the sake of their eight-year-old son and because she loves her husband. Enter Avery Chambers. Avery is a therapist who lost her professional license. Still, it doesn’t stop her from counseling those in crisis, though they have to adhere to her unorthodox methods. And the Bishops are desperate. When they glide through Avery’s door and Marissa reveals her infidelity, all three are set on a collision course. Because the biggest secrets in the room are still hidden, and it’s no longer simply a marriage that’s in danger.',
            'image'=>'the_golden_couple.jpg',
            'publish_year'=>'2022',
            'genre_id'=>61
        ]);

        $author = Author::firstOrCreate(['name'=>'Greer Hendricks']);
        $author2 = Author::firstOrCreate(['name'=>'Sarah Pekkanen']);
        $book->authors()->sync([$author->id,$author2->id]);

        $book = Book::create([
            'book_name'=>'Hostage',
            'price'=>18,
            'description'=>'You can save hundreds of lives. Or the one that matters most... From New York Times bestselling author Clare Mackintosh comes a claustrophobic thriller set over 20 hours on-board the inaugural nonstop flight from London to Sydney. Mina is trying to focus on her job as a flight attendant, not the problems with her five-year-old daughter back home, or the fissures in her marriage. But the plane has barely taken off when Mina receives a chilling note from an anonymous passenger, someone intent on ensuring the plane never reaches its destination: "The following instructions will save your daughter\'s life..." Someone needs Mina\'s assistance and knows exactly how to make her comply. When one passenger is killed and then another, Mina knows she must act. But which lives does she save: Her passengers...or her own daughter and husband who are in grave distress back at home? It\'s twenty hours to landing. A lot can happen in twenty hours.',
            'image'=>'hostage.jpg',
            'publish_year'=>'2022',
            'genre_id'=>61
        ]);

        $author = Author::firstOrCreate(['name'=>'Clare Mackintosh']);
        $book->authors()->sync($author->id);

        $book = Book::create([
            'book_name'=>'Killer View',
            'price'=>8,
            'description'=>'Kendra Michaels, blind before gaining her sight via a revolutionary surgical procedure, offers her razor-sharp senses to assist her friend Jessie Mercado in a baffling case. An army vet and former bodyguard for the rich and famous, Jessie has faced all kinds of danger but one thing the motorcycle-riding private investigator has never encountered before is an incarceration consultant. Preparing wealthy people to go to prison is big business. When Owen Blake of Mamertine Consulting hires Mercado to find his missing partner, their suspect list is filled with recently released white-collar criminals, a few drug kingpins, and a couple of murderers to keep things interesting. As witnesses turn up dead and car chases leave destruction in their wake, Jessie and Kendra learn just how far someone will go to keep the fate of one man hidden. But why? Together they must hunt down the lethal secrets of Blake’s company, hell-bent on staying one step ahead of disaster.',
            'image'=>'killer_view.jpg',
            'publish_year'=>'2022',
            'genre_id'=>61
        ]);

        $author = Author::firstOrCreate(['name'=>'Roy Johansen']);
        $book->authors()->sync($author->id);
    }
}
