# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.25)
# Base de datos: app_gofit
# Tiempo de Generación: 2019-08-09 02:32:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla bodyparts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bodyparts`;

CREATE TABLE `bodyparts` (
  `bodypart_id` int(11) NOT NULL AUTO_INCREMENT,
  `bodypart_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `bodypart_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`bodypart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `bodyparts` WRITE;
/*!40000 ALTER TABLE `bodyparts` DISABLE KEYS */;

INSERT INTO `bodyparts` (`bodypart_id`, `bodypart_title`, `bodypart_image`)
VALUES
	(1,'Biceps','bodypart_1517098401.jpg'),
	(2,'Quads','bodypart_1517098193.jpg'),
	(3,'Chest','bodypart_1517097822.png'),
	(4,'Forearms','bodypart_1517097903.jpg'),
	(5,'Triceps','bodypart_1517097991.jpg'),
	(8,'Abs','bodypart_1517098045.jpg'),
	(9,'Shoulders','bodypart_1517098824.jpg'),
	(10,'Back','bodypart_1519938334.jpg');

/*!40000 ALTER TABLE `bodyparts` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` text CHARACTER SET latin1 NOT NULL,
  `category_image` varchar(150) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`category_id`, `category_title`, `category_image`)
VALUES
	(1,'Fat Loss','catdiet_1516827171.jpg'),
	(2,'Muscle Gain','catdiet_1516827177.jpg'),
	(3,'Vegetarian','catdiet_1516827183.jpg'),
	(4,'Protein Shakes','catdiet_1518094768.jpg');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla diets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `diets`;

CREATE TABLE `diets` (
  `diet_id` int(11) NOT NULL AUTO_INCREMENT,
  `diet_title` varchar(150) CHARACTER SET latin1 NOT NULL,
  `diet_description` text CHARACTER SET latin1 NOT NULL,
  `diet_ingredients` text COLLATE utf8_unicode_ci NOT NULL,
  `diet_category` int(11) NOT NULL,
  `diet_directions` text CHARACTER SET latin1 NOT NULL,
  `diet_calories` varchar(50) CHARACTER SET latin1 NOT NULL,
  `diet_carbs` varchar(50) CHARACTER SET latin1 NOT NULL,
  `diet_protein` varchar(50) CHARACTER SET latin1 NOT NULL,
  `diet_fat` varchar(50) CHARACTER SET latin1 NOT NULL,
  `diet_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diet_servings` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diet_featured` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diet_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diet_image` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`diet_id`),
  KEY `FK_categories` (`diet_category`),
  CONSTRAINT `FK_categories` FOREIGN KEY (`diet_category`) REFERENCES `categories` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `diets` WRITE;
/*!40000 ALTER TABLE `diets` DISABLE KEYS */;

INSERT INTO `diets` (`diet_id`, `diet_title`, `diet_description`, `diet_ingredients`, `diet_category`, `diet_directions`, `diet_calories`, `diet_carbs`, `diet_protein`, `diet_fat`, `diet_time`, `diet_servings`, `diet_featured`, `diet_status`, `diet_image`)
VALUES
	(1,'Greek Spinach and Artichoke Dip','<p>Lighten up this spinach-artichoke spread with Greek yogurt and pita chips. It makes for the perfect low-cal yet traditional appetizer you can serve at a party that won&#39;t have people running for the door.</p>','<ul><li>2 tsp olive oil</li><li>2 garlic cloves, minced</li><li>10 oz frozen spinach, thawed and drained</li><li>1 (14 oz) can artichoke hearts, drained and chopped</li><li>1 cup plain nonfat Greek yogurt</li><li>1 cup reduced-fat cream cheese</li><li>&frac12; cup grated Parmesan cheese</li><li>Salt and pepper</li></ul>',1,'<ol><li>Heat oil in a large saucepan over medium heat. Add garlic, spinach, and artichokes. Cook until tender, about 5 minutes.</li><li>Stir in yogurt and cream cheese. Add Parmesan and salt and pepper to taste. Cook, stirring occasionally, until thickened, 5 to 10 minutes. Serve warm.</li></ol>','116','9g','7g','7g','15 Min','8','1','1','recipe_1518024640.jpg'),
	(2,'Tangy Barbecue Chicken','<p>If chicken breast is among your favorite go-tos for a tasty and reliable protein fix, you&#39;ll want to add this dish to your muscle-building arsenal. This version gets its kick from tangy apple cider vinegar and spicy mustard paired with just a little bit of brown sugar and ketchup.</p>','<ul><li>2/3 cup apple cider vinegar</li><li>1/2 cup yellow mustard</li><li>1 tsp onion powder</li><li>1 tsp garlic powder</li><li>2 pinches salt</li><li>1/8 cup brown sugar</li><li>1/2 cup low-sodium ketchup</li><li>4 chicken breasts</li></ul>',1,'<ol><li>Preheat grill. Place all ingredients except chicken in a sauce pan. Heat over medium flame, cooking until contents are reduced by 50%.</li><li>Spread barbecue sauce on chicken breasts and place on grill. (Sauce can also be cooled for later use.)</li><li>Grill breasts 4-5 minutes on each side, or until no longer pink inside.</li></ol>','308','12g','52g','2g','60 Min','4','1','1','recipe_1518028133.jpg'),
	(3,'Chicken, Asparagus, and Brie Omelet','<p>Cooking your chicken in bulk is the smart way to prep your meals for the week.</p><p>However, you&rsquo;ll inevitably be left with extra portions taking up space in your fridge. And then what are you going to do? Wait a few days, until it&rsquo;s dry and rubbery, before using it to make a batch of uninspired, slapdash snacks?</p><p>You&rsquo;re better than that. Instead, use it to whip up three days&rsquo; worth of mouth-watering, muscle-making meals that are healthy to boot.</p><p>Bonus: The soup recipe will have even four-day-old chicken tasting as moist and succulent as the day you cooked it up.</p>','<ul><li>2 large eggs</li><li>4 egg whites</li><li>1/8 tsp salt</li><li>1/8 tsp ground black pepper</li><li>Cooking spray</li><li>1 1/2 oz leftover skinless chicken, chopped</li><li>6 cooked asparagus spears, cut into 1/4-inch pieces</li><li>1 1/2 oz brie</li><li>1/4 cup leftover cranberry sauce (optional)</li></ul>',2,'<ol><li>In a small bowl, whisk eggs, egg whites, salt, and black pepper.</li><li>Coat large skillet with cooking spray and heat over medium heat. Pour in egg mixture.</li><li>When the edges begin to set, push the cooked portion toward the center with a spatula. Tilt the skillet so any uncooked egg reaches the hot pan. When eggs set, add chicken and asparagus to one side. Cook for 1 minute. Add brie and cook 1 to 2 minutes, until the cheese melts.</li><li>Fold omelet in half and serve with cranberry sauce, if desired.</li></ol>','263','25g','15g','12g','30 Min','2','0','1','recipe_1519697004.jpg'),
	(4,'Spicy Chicken and Root Vegetable Soup','<p>Cooking your chicken in bulk is the smart way to prep your meals for the week.</p><p>However, you&rsquo;ll inevitably be left with extra portions taking up space in your fridge. And then what are you going to do? Wait a few days, until it&rsquo;s dry and rubbery, before using it to make a batch of uninspired, slapdash snacks?</p><p>You&rsquo;re better than that. Instead, use it to whip up three days&rsquo; worth of mouth-watering, muscle-making meals that are healthy to boot.</p><p>Bonus: The soup recipe will have even four-day-old chicken tasting as moist and succulent as the day you cooked it up.</p>','<ul><li>1 cup packed baby spinach</li><li>1 tbsp olive oil</li><li>1 medium onion, chopped</li><li>1 medium carrot, chopped</li><li>1 celery rib, chopped</li><li>1 medium turnip, chopped</li><li>1 (15 oz) can brown lentils, drained</li><li>6 oz leftover skinless chicken, shredded</li><li>6 cups (48 fluid oz) low-sodium chicken stock</li><li>1 tbsp mirin (Japanese sweet rice wine found in the Asian-foods aisle)</li><li>2 bay leaves</li><li>1/8 tsp cayenne</li></ul>',2,'<ol><li>Stack spinach leaves, roll, then slice into ribbons.</li><li>Heat oil in a large pot over medium heat. When simmering, add onion, carrot, celery, and turnip. Cook until onion is translucent, about 4 minutes. Add lentils, chicken, stock, mirin, and bay leaves; stir to combine. Turn heat up to high and bring to a boil, then reduce heat, cover, and simmer until lentils are tender, about 20 minutes.</li><li>Remove bay leaves. Stir in cayenne and spinach. Ladle into bowls.</li></ol>','273','32g','25g','8g','60 Min','4','1','1','recipe_1519697891.jpg'),
	(5,'Chicken-walnut Salad With Pomegranate Seeds','<p>Cooking your chicken in bulk is the smart way to prep your meals for the week.</p><p>However, you&rsquo;ll inevitably be left with extra portions taking up space in your fridge. And then what are you going to do? Wait a few days, until it&rsquo;s dry and rubbery, before using it to make a batch of uninspired, slapdash snacks?</p><p>You&rsquo;re better than that. Instead, use it to whip up three days&rsquo; worth of mouth-watering, muscle-making meals that are healthy to boot.</p><p>Bonus: The soup recipe will have even four-day-old chicken tasting as moist and succulent as the day you cooked it up.</p>','<ul><li>8 oz leftover skinless chicken, chopped</li><li>1/2 medium onion, finely chopped</li><li>1 celery rib, finely chopped</li><li>1/4 cup (1 oz) finely chopped walnuts</li><li>2 tbsp pomegranate arils/seeds (or dried cranberries)</li><li>2 tbsp light mayonnaise</li><li>2 tbsp nonfat plain Greek yogurt</li><li>1 tbsp Dijon mustard</li><li>1 tsp fresh lemon juice</li><li>1/4 tsp salt</li><li>1/8 tsp ground black pepper</li><li>4 (8-inch) low-carb, whole-wheat flour tortillas</li></ul>',1,'<ul><li>In a medium bowl, combine chicken, onion, celery, and walnuts with pomegranate arils.</li><li>In a small bowl, whisk together mayo, yogurt, mustard, lemon juice, salt, and black pepper until well-combined. Add to chicken. Stir to coat evenly.</li><li>Add chicken salad to tortillas. Fold the sides in; bring bottom up; roll to close.</li></ul>','162','25g','17g','6g','40 Min','4','1','1','recipe_1519698091.jpg'),
	(6,'Peanut-Banana Pancakes','<p>Serve up this tasty, muscle-building breakfast that&#39;s loaded with protein.</p>','<ul><li>&frac12; cup whole wheat or oat flour</li><li>&frac12; cup peanut flour</li><li>1 tsp baking powder</li><li>&frac12; tsp cinnamon</li><li>1 large egg, beaten</li><li>1 ripe banana, mashed</li><li>&frac12; cup low-fat cow&#39;s or goat&#39;s milk</li><li>⅓ cup walnuts, chopped</li><li>1 tbsp unsalted butter</li></ul>',1,'<ol><li>In a large bowl, mix whole wheat flour, peanut flour, baking powder, and cinnamon. In a separate bowl, stir together egg, banana, and milk.</li><li>Add wet ingredients to dry ingredients and mix until moist.</li><li>Stir in additional milk if needed.</li><li>Gently stir walnuts into batter.</li><li>Heat a large skillet over medium.</li><li>Add butter and allow to melt.</li><li>Using a measuring cup, drop batter onto skillet and cook for approximately 3 minutes per side, or until golden.</li><li>Repeat with remaining batter.</li></ol>','456','18g','25g','46g','15 Min','3','0','1','recipe_1519698889.jpg'),
	(7,'Post-workout Shake: Cherry Vanilla','<p>This delicious, nutrient-packed blend will leave you wanting more.</p>','<ul><li>1&frac12; tsp all-natural almond butter</li><li>&frac34; cup coconut milk</li><li>&frac12; cup frozen cranberries</li><li>1 cup dark, pitted cherries</li><li>&frac12; scoop vanilla whey protein powder</li><li>&frac12; tbsp chia seeds</li><li>1 tsp pure agave nectar</li><li>1 cup ice</li></ul>',4,'<ol><li>Add all of the ingredients into a blender and blend on medium-high for 1 minute or until smooth.</li></ol>','350','33g','25g','15g','1 Min','1','0','1','recipe_1519974269.jpg'),
	(8,'Post-workout Shake: Pumpkin Pie','<p>Spruce up your boring vanilla, or chocolate post-workout protein shake with this pumpkin pie milkshake.</p>','<ul><li>&frac14; cup unsweetened almond milk</li><li>&frac12; cup pumpkin</li><li>&frac12; cup organic yogurt</li><li>&frac12; cup vanilla whey protein powder</li><li>1 tsp pure organic honey</li><li>1 tsp graham cracker crumbs</li><li>&frac34; tsp ground cinnamon</li><li>&frac12; tsp ground nutmeg</li><li>1 tsp sugar-free pumpkin instant Jell-O Pudding Mix</li></ul>',4,'<ol><li>Add all of the ingredients into a blender and blend on medium-high for 1 minute or until smooth.</li></ol>','200','18g','16g','5g','1 Min','1','1','1','recipe_1519974429.jpg'),
	(9,'Beet Smoothie for Optimal Recovery','<p>You can&#39;t go wrong with this nutrient-packed healthy beverage.</p>','<ul><li>1 cooked beet, peeled and quartered</li><li>1 cup frozen blueberries</li><li>1 small frozen banana</li><li>1 cup unsweetened almond milk or other milk of choice</li><li>1 cup coconut water</li><li>1 inch knob fresh ginger, peeled</li><li>1 tbsp almond butter</li></ul>',4,'<ol><li>Combine all ingredients in blender; blend until smooth.</li></ol>','197','15g','17g','9g','1 Min','1','0','1','recipe_1519974784.jpg'),
	(10,'The Santina Spritz','<p>A prosecco and Aperol spritz screams summer, cool down with this low-cal version.</p>','<ul><li>3 parts Prosecco</li><li>2 parts frozen Aperol</li><li>1 part club soda</li></ul>',4,'<ol><li>Scoop out frozen Aperol, and place into a pitcher. Pour one bottle of prosecco over the frozen Aperol, and top with soda water. Pour into glasses, and garnish with an orange slice and mint sprig.</li></ol>','180','22g','14g','7g','1 Min','1','0','1','recipe_1519975136.jpg'),
	(11,'Super-Easy Barbacoa &amp; Jicama Tacos','<p>Prep these low-carb tacos up to five days in advance for hassle-free eating.</p>','<ul><li>1 tsp fine sea salt</li><li>&frac12; tsp ground black pepper</li><li>1 tbsp ground cumin</li><li>1 tbsp chipotle chili powder</li><li>1 tbsp dried Mexican oregano leaves</li><li>&frac12; tsp ground cloves</li><li>3 lbs chuck roast, cut into 8 large chunks</li><li>2 tbsp salted butter</li><li>4 garlic cloves, minced</li></ul>',2,'<ol><li>In a small bowl, mix together the salt, pepper, cumin, chili powder, oregano, and cloves. Dust the pieces of chuck roast with the spice mixture, making sure to coat all sides well.</li><li>Melt the butter in a large frying or saut&eacute; pan over high heat. Add the beef in batches so that the pan isn&rsquo;t overcrowded. Sear the beef for about 3 minutes per side, or until it develops a nice char. Transfer the cooked beef to a slow cooker and repeat with the remaining meat.</li><li>Add the garlic and bay leaves to the beef in the slow cooker. Pour in the vinegar and lime juice. Cover, and cook for 4 hours on high, or until the beef falls apart when tested with a fork.</li><li>Remove and discard the bay leaves. Then, working in the slow cooker, use two forks to shred the beef. Stir it in the accumulated juices.</li><li>To make the jicama tortillas, place the jicama discs in a steamer basket over boiling water and steam for 3 minutes, or place them in a microwave-safe bowl with 2 tbsp water, cover, and microwave on high for 3 minutes. They&rsquo;re finished when they become flexible. Let cool, then drain over paper towels. Top the jicama with the shredded beef and garnish with lime wedges, avocado, and cilantro.</li></ol>','456','40g','16g','17g','40 Min','6','1','1','recipe_1519975733.jpg'),
	(12,'A nutritious, muscle-building breakfast','<p>Is breakfast really the most important meal of the day? Some claim breakfast helps jump-start your metabolism, improves cognitive performance, and aids in weight loss; whereas others suggest that it has little effect on weight or may even hinder weight loss. Regardless, many of us aren&rsquo;t ready to ditch our morning meal, and for good reason.</p>','<ul><li>1 chicken breast (7-9 oz.)</li><li>1 yam</li><li>1 cup peas, corn and carrots</li></ul>',2,'<ol><li>Add a tall glass of low-fat milk and saute the chicken in extra-virgin olive oil for additional protein and essential fats that help growth.<br />&nbsp;</li></ol>','603','50g','25g','6g','30 Min','4','0','1','recipe_1519976213.jpg'),
	(13,'Supergreen Candy Salad','<p>Quinoa, the king of carbs, is a great alternative to typical grains like wheat, oats, and barley. What sets quinoa apart is its amino acid profile, which yields a whopping 24g of complete protein per cup. Quinoa also contains high levels of heart-healthy essential fatty acids, such as ALA and oleic acid.</p>','<ul><li>2&frac14; oz baby leaf spinach</li><li>2 tsp mint</li><li>2 tsp fresh cilantro</li><li>1 large scallion</li><li>&frac14; red chili</li><li>1 tbsp extra-virgin olive oil</li><li>For the salad:</li><li>&frac34; cup quinoa, uncooked</li><li>3 oz chicken breast</li></ul>',3,'<ol><li>Place all dressing ingredients in a blender and puree.</li><li>Cook quinoa according to package directions, then drain and cool.</li><li>Slice chicken breast along its length to get a butterflied joint. Season with salt and pepper and cook in an oiled pan over medium heat for 4 minutes on each side.</li><li>Remove from heat and shred chicken.</li><li>In a large bowl, mix dressing with cooked quinoa. Toss vegetables and fruits together and mix; then crumble in feta.&nbsp;</li><li>To serve, divide among four plates and top with shredded chicken.&nbsp;</li></ol>','545','35g','25g','79g','15 Min','5','0','1','recipe_1519976534.jpg'),
	(14,'Spring Pea Coconut Curry','<p>Power up, and pack on protein with this nutrient-rich meal.</p>','<ul><li>1 13.5-oz can coconut milk</li><li>&frac12; cup chicken stock</li><li>2 tsp green curry paste</li><li>1 pint of fresh spring peas or &frac12; bag frozen</li><li>1 Tbsp sugar (brown, cane, or coconut)</li><li>2 Tbsp fish sauce</li><li>&frac12; lb boneless, skinless chicken breast, cubed</li></ul>',3,'<ol><li>Place coconut milk and chicken stock in a pot, and cook over medium-high heat for about 3 minutes. Whisk in curry paste and add half of the peas, along with sugar and fish sauce; cook another 3 minutes.</li><li>Pour mixture into a blender (or use a handheld blender), and blend until smooth. Return to pot and heat again over medium-high. (Don&rsquo;t boil.)</li><li>Add chicken and remaining peas; stir. Cook 5 minutes or until chicken is just cooked through. Add lime juice, and stir.</li><li>Divide between two bowls. Top with pea shoots and cilantro, and garnish with lime.</li></ol>','354','36g','26g','65g','30 Min','4','0','1','recipe_1519976739.jpg'),
	(15,'Slow-cooker Stuffed Peppers','<p>These stuffed peppers are loaded with protein for maximum muscle-building potential.</p>','<ul><li>1 cup quinoa</li><li>2 cups water</li><li>1 onion, chopped</li><li>5 tsp chili powder</li><li>2 tsp chipotle liquid from canned chipotle peppers</li><li>1 cup canned black beans</li></ul>',3,'<ol><li>To start, cook the quinoa according to package instructions.</li><li>Saut&eacute; the onion then add the ground beef to pan, and cook until brown.</li><li>Add the chili powder and chipotle liquid to the pan, then add in the black beans, tomato paste, and three-fourths cup of the crushed tomatoes. Once the sauce thickens, stir in the quinoa.</li></ol>','435','46g','23g','18g','15 Min','3','0','1','recipe_1519976893.jpg');

/*!40000 ALTER TABLE `diets` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla equipments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `equipments`;

CREATE TABLE `equipments` (
  `equipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_title` varchar(150) CHARACTER SET latin1 NOT NULL,
  `equipment_image` varchar(150) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`equipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `equipments` WRITE;
/*!40000 ALTER TABLE `equipments` DISABLE KEYS */;

INSERT INTO `equipments` (`equipment_id`, `equipment_title`, `equipment_image`)
VALUES
	(1,'Dumbbells','equipment_1517248382.png'),
	(2,'Barbell','equipment_1517248454.png'),
	(3,'Kettlebells','equipment_1517248460.png'),
	(4,'No Equipment','equipment_1517248680.png'),
	(5,'Pull-up Bar','equipment_1517248764.png'),
	(6,'Medicine Ball','equipment_1519940384.png');

/*!40000 ALTER TABLE `equipments` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla exercises
# ------------------------------------------------------------

DROP TABLE IF EXISTS `exercises`;

CREATE TABLE `exercises` (
  `exercise_id` int(11) NOT NULL AUTO_INCREMENT,
  `exercise_title` varchar(150) CHARACTER SET latin1 NOT NULL,
  `exercise_reps` varchar(50) CHARACTER SET latin1 NOT NULL,
  `exercise_sets` varchar(50) CHARACTER SET latin1 NOT NULL,
  `exercise_rest` varchar(50) CHARACTER SET latin1 NOT NULL,
  `exercise_equipment` int(11) NOT NULL,
  `exercise_level` int(11) NOT NULL,
  `exercise_image` varchar(150) CHARACTER SET latin1 NOT NULL,
  `exercise_video` varchar(250) CHARACTER SET latin1 NOT NULL,
  `exercise_tips` text COLLATE utf8_unicode_ci NOT NULL,
  `exercise_instructions` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`exercise_id`),
  KEY `FK_exercises_equipments` (`exercise_equipment`),
  KEY `FK_exercises_levels` (`exercise_level`),
  CONSTRAINT `FK_exercises_equipments` FOREIGN KEY (`exercise_equipment`) REFERENCES `equipments` (`equipment_id`),
  CONSTRAINT `FK_exercises_levels` FOREIGN KEY (`exercise_level`) REFERENCES `levels` (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `exercises` WRITE;
/*!40000 ALTER TABLE `exercises` DISABLE KEYS */;

INSERT INTO `exercises` (`exercise_id`, `exercise_title`, `exercise_reps`, `exercise_sets`, `exercise_rest`, `exercise_equipment`, `exercise_level`, `exercise_image`, `exercise_video`, `exercise_tips`, `exercise_instructions`)
VALUES
	(1,'Renegade Row','12','4','30 Sec',1,2,'exercise_1519883084.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(2,'Elbow Plank Pike Jacks','12','3','1 Min',4,2,'exercise_1519883483.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(3,'Full Plank Passe Twist','12','4','30 Sec',4,1,'exercise_1519883704.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(4,'Dumbbell Side Lunge','10','3','1 Min',1,1,'exercise_1519883956.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(5,'Sumo Squat Swing','10','3','30 Sec',3,1,'exercise_1519884158.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(6,'Barbell Hang Pull','10','4','1 Min',5,3,'exercise_1519884329.jpg','https://firebasestorage.googleapis.com/v0/b/tienda-reada-fitness.appspot.com/o/videos%2F6.mp4?alt=media&token=3e7494e2-f94c-45db-8b06-2977516cd93f','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(7,'Single-arm Neutral-grip Dumbbell Row','10','3','30 Sec',1,1,'exercise_1519884492.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(9,'Feet-elevated Side-to-Side Pushup','10','3','1 Min',4,2,'exercise_1519884889.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(10,'Plank with Arm Raise','12','3','30 Sec',4,2,'exercise_1519938568.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(11,'Partial Single-leg Squat','15','3','45 Sec',4,2,'exercise_1519938967.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(12,'EZ-Bar Pullover','10','4','45 Sec',2,1,'exercise_1519939226.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(13,'EZ-Bar Overhead Triceps','12','3','1 Min',2,1,'exercise_1519939489.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(14,'Cross Punch Roll-up','10','4','1 Min',4,1,'exercise_1519940111.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(15,'Single-arm Medicine Ball Pushup','8','3','45 Sec',6,4,'exercise_1519940316.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(16,'Glutes Stretch','12','3','1 Min',4,1,'exercise_1519940754.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(17,'90-degree Static Hold','12','3','45 Sec',4,1,'exercise_1519940878.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(18,'Barbell High Pull','10','4','1 Min',2,3,'exercise_1519941525.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(19,'Reclining Triceps Press','15','4','45 Sec',4,1,'exercise_1519941887.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
	(20,'Overhead Lunge with Medicine Ball','12','4','1 Min',6,2,'exercise_1519942162.jpg','https://yourvideolink.com/','<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>','<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>');

/*!40000 ALTER TABLE `exercises` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla exercises_bodyparts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `exercises_bodyparts`;

CREATE TABLE `exercises_bodyparts` (
  `bodypart_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  KEY `FK_exercises_bodyparts_bodyparts` (`bodypart_id`),
  KEY `FK_exercises_bodyparts_exercises` (`exercise_id`),
  CONSTRAINT `FK_exercises_bodyparts_bodyparts` FOREIGN KEY (`bodypart_id`) REFERENCES `bodyparts` (`bodypart_id`),
  CONSTRAINT `FK_exercises_bodyparts_exercises` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`exercise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `exercises_bodyparts` WRITE;
/*!40000 ALTER TABLE `exercises_bodyparts` DISABLE KEYS */;

INSERT INTO `exercises_bodyparts` (`bodypart_id`, `exercise_id`)
VALUES
	(9,3),
	(8,3),
	(2,4),
	(2,5),
	(8,6),
	(2,6),
	(1,6),
	(1,7),
	(10,10),
	(9,10),
	(8,10),
	(2,11),
	(9,13),
	(5,13),
	(3,12),
	(5,12),
	(9,12),
	(10,12),
	(10,14),
	(9,14),
	(8,14),
	(1,15),
	(5,15),
	(9,15),
	(8,16),
	(2,16),
	(8,17),
	(10,18),
	(9,18),
	(8,18),
	(2,18),
	(1,18),
	(9,19),
	(8,19),
	(5,19),
	(9,20),
	(2,20),
	(8,2),
	(4,2),
	(3,9),
	(5,9),
	(8,9),
	(9,9),
	(4,9),
	(4,1),
	(5,1),
	(8,1),
	(9,1);

/*!40000 ALTER TABLE `exercises_bodyparts` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla goals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `goals`;

CREATE TABLE `goals` (
  `goal_id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_title` varchar(150) CHARACTER SET latin1 NOT NULL,
  `goal_image` varchar(150) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`goal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `goals` WRITE;
/*!40000 ALTER TABLE `goals` DISABLE KEYS */;

INSERT INTO `goals` (`goal_id`, `goal_title`, `goal_image`)
VALUES
	(1,'Fat Loss','goal_1516827131.jpg'),
	(2,'Build Muscle','goal_1516827137.jpg'),
	(3,'Transform','goal_1516827143.jpg'),
	(4,'Strength','goal_1517335949.jpg');

/*!40000 ALTER TABLE `goals` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla levels
# ------------------------------------------------------------

DROP TABLE IF EXISTS `levels`;

CREATE TABLE `levels` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_title` varchar(50) CHARACTER SET latin1 NOT NULL,
  `level_description` text CHARACTER SET latin1 NOT NULL,
  `level_image` varchar(150) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;

INSERT INTO `levels` (`level_id`, `level_title`, `level_description`, `level_image`)
VALUES
	(1,'Beginner','','level_1516827206.jpg'),
	(2,'Intermediate','','level_1516827220.jpg'),
	(3,'Advanced','','level_1516827226.jpg'),
	(4,'Elite','','level_1517336508.jpg');

/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla managers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `managers`;

CREATE TABLE `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(200) CHARACTER SET latin1 NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `managers` WRITE;
/*!40000 ALTER TABLE `managers` DISABLE KEYS */;

INSERT INTO `managers` (`id`, `password`, `username`)
VALUES
	(1,'admin','admin');

/*!40000 ALTER TABLE `managers` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_txn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_gross` float(10,2) NOT NULL,
  `order_cc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_platform` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Volcado de tabla posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(150) CHARACTER SET latin1 NOT NULL,
  `post_description` text CHARACTER SET latin1 NOT NULL,
  `post_tag` int(11) NOT NULL,
  `post_featured` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_image` varchar(50) CHARACTER SET latin1 NOT NULL,
  `post_status` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `FK_categories` (`post_tag`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_tag`) REFERENCES `tags` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`post_id`, `post_title`, `post_description`, `post_tag`, `post_featured`, `post_date`, `post_image`, `post_status`)
VALUES
	(1,'\'AJ\' Gets Ready in the Gym','<p><a href=\"https://www.google.com\">Anthony Joshua&rsquo;s</a> Herculean physique has been a major factor on his way to a 20-0 record&mdash;and thanks to his many Instagram workout clips, we can all get a glimpse at how he packs on the muscle.</p><p>Joshua&#39;s penultimate fight was originally set for a rematch before Wladimir Klitschko retired, which forced Joshua to fight Kubrat Pulev to keep his belt.Just recently, his opponent changed again.</p><p>The fight&#39;s promoters announced that Pulev sustained a shoulder injury and stepped down from the fight. Joshua&#39;s mandatory opponent will be Carlos Takam, whom he beat back in October.</p>',2,'1','2018-02-09 22:22:49','post_1518211526.jpg','0'),
	(2,'\'The Rock\' Reflects On His Mom\'s Suicide Attempt','<p>Whether it&#39;s a movie or television show, when Dwayne &quot;The Rock&quot; Johnson appears on the screen hilarity or action-packed ass kickings typically ensue. On rare occasions, however, you&#39;ll find a somber moment during which one of the world&#39;s most intimidating, yet kind-hearted men lets down his guard to expose a softer side.</p><p>A rare sighting of that sort recently took place on the set of HBO&#39;s hit show Ballers when a scene called for Johnson&#39;s character to visit his brother&#39;s grave site.</p><p>While he admitted that it was a tough scene to shoot, the action star saw the experience as a reminder to be aware of others close to us who may be having a difficult time in life. &quot;Help &lsquo;em thru it, get &lsquo;em talkin&rsquo; about the struggle and remind &lsquo;em that they&rsquo;re not alone,&quot; he wrote.</p><p>Johnson&#39;s mother survived that traumatizing event, but the haunting memory will always be with him. Sharing this personal story may have been difficult for a guy more comfortable talking about his battle with the iron, but it certainly will help to shed more light on a sensitive subject that deserves our attention.&nbsp;</p><p>&nbsp;</p>',2,'1','2018-02-09 22:28:18','post_1518211699.jpg','1'),
	(3,'Goldberg Looks Massively Ripped on \'The Flash\'','<p>Legendary wrestler Bill Goldberg is having a great month.</p><p>On top of finding out that he&rsquo;ll be inducted into the WWE Hall of Fame as part of the Class of 2018, Goldberg also will appear on the CW series The Flash.</p><p>The first photos from the episode have trickled out, showing a ripped Goldberg alongside Barry Allen (Grant Gustin) while locked up in jail. Goldberg filmed scenes for two episodes, posting on Instagram that he had a &ldquo;great experience&rdquo; with Gustin, calling the actor &ldquo;a true scholar and gentleman!&rdquo;</p>',2,'1','2018-02-09 22:30:35','post_1518211836.jpg','1'),
	(4,'5 Biggest Mistakes To Avoid In 2018','<p>Hey guys, it&#39;s February and, hopefully, a lot of people are still working hard on their New Year&#39;s resolutions. I won&#39;t lie to you&mdash;I don&#39;t believe in these kinds of resolutions. I just don&#39;t. Don&#39;t get me wrong, I&#39;m all about people deciding to make positive changes in their lives. I&#39;m all for people deciding to live healthier lives. But New Year&#39;s resolutions fail most of the time. That&#39;s probably why people keep making the same ones year after year.</p><p>I want you to set realistic goals&mdash;and them reach them. I want you to live a better, healthier life. So, I put together a list of mistakes that hundreds of thousands of people make every year. Avoid them, and the next time you set goals you won&#39;t have to set them again; next time, or maybe this time, you&#39;ll make them happen!</p><ol><li>Don&#39;t Set Unrealistic Goals</li><li>Don&#39;t Kid Yourself That Exercise Will Solve Everything</li><li>Don&#39;t Forget To Set Up Goals And Rewards</li><li>Don&#39;t Fall For Fad Diets</li><li>Don&#39;t Forget The Basics</li></ol>',1,'1','2018-02-10 20:16:16','post_1518290177.jpg','1'),
	(5,'Sly Stallone on Death Rumors: \'Ignore This Stupidity\'','<p>Every celebrity ends up on the receiving end of some death rumors. Celeb death rumors are so plentiful, in fact, that for the most part actors and musicians don&#39;t even bother to respond. But Sylvester Stallone, known for his role as the iconic Rocky Balboa in the Rocky franchise and his enduring status as one of Hollywood&#39;s top action heroes, isn&#39;t the type of guy to let that sort of thing slide.</p><p>So when rumors began to circulate that he&#39;d succumbed to prostate cancer following a secret battle with the disease, he took to Instagram to let fans know that he&#39;s alive&mdash;and punching, of course.</p><p>&quot;Please ignore this stupidity,&quot; Stallone captioned a screenshot of one fan&#39;s memorial post on Facebook. &quot;Alive and well and happy and healthy...Still punching!&quot; The photo has been liked over 420,000 times since Stallone posted it on his Instagram account on Monday.</p><p>If you need more proof that Sly&#39;s alive and well, you need look no further than his last few Instagram posts. When he&#39;s not sharing fan photos ahead of the much-anticipated Rocky spinoff Creed II, he&#39;s hitting the gym hard.</p>',2,'1','2018-02-25 05:54:49','post_1519534490.jpg','1'),
	(6,'Jason Statham to Play Assassin in ‘Killer\'s Game\': Report','<p>Jason Statham is starting to challenge Dwayne &ldquo;The Rock&rdquo; Johnson as the busiest man in Hollywood.</p><p>With his mega-monster shark film The Meg coming up in August and a Hobbs and Shaw spinoff with Johnson on the horizon, Statham just keeps on adding projects.&nbsp;</p><p>Statham already is set to return for the sequel Spy 2 with Melissa McCarthy. He&#39;s developing a Hong Kong action thriller with STX Entertainment. Now, he has another badass role on the horizon: veteran hitman.</p><p>Statham is circling the lead role in The Killer&rsquo;s Game, with xXx: The Return of Xander Cage director D.J. Caruso behind the camera, according to an exclusive in The Hollywood Reporter.</p><p>The film is based on Jay Bonansinga&rsquo;s novel, and follows &ldquo;a veteran assassin who is diagnosed with a life-threatening illness and takes a hit out on himself to avoid the pain that is destined to follow. After ordering the kill, he finds out that he was misdiagnosed&mdash;and must then fend off the army of former colleagues trying to kill him.&rdquo;</p><p>The script has been floating around Hollywood for years, with stars like Michael Keaton and Wesley Snipes having been attached to it in the past.</p><p>Assassins trying to kill another assassin gives the story some undeniable John Wick vibes, which should make Killer&#39;s Game an action-fest with Statham smack-dab in the middle of it.&nbsp;</p><p>The Meg is set for release on August 10, 2018.</p>',2,'0','2018-02-25 05:56:19','post_1519534580.jpg','1'),
	(7,'What to Do If Working Out Is Killing Your Knees','<p>Knee pain is a common exercise complaint. The knee is an intricate joint, involving bones, menisci, muscles, tendons, and ligaments all supporting the joint. If there is damage or stress to any of these components, you may have achy knees.</p><p>Plus, many physical activities&mdash;running, jumping, stretching, bending&mdash;can put a lot of strain, impact, or body weight directly on the knees, and in turn, cause pain while you work out. This is common among weekend warriors who work out intensely but inconsistently.</p><p>You can also develop tendonitis over time if you&rsquo;re regularly doing these motions.</p>',3,'1','2018-03-02 09:01:29','post_1519977690.jpg','1'),
	(8,'Even Light Exercise Can Help You Live Longer','<p>A new study shows that small bouts of light physical activity are enough to increase lifespan in older men.</p><p>Government guidelines recommended that adults get at least 2 hours and 30 minutes of moderate-intensity exercise every week. However, only about half of American adults actually meet those recommendations, and for older adults, they may seem hard to achieve. But a new report published in the British Journal of Sports Medicine suggests that there&rsquo;s a way to tweak guidelines to make them more feasible for older people, while still maintaining health.</p><p>In the report, researchers looked at about 1,180 men &mdash; average age, 78 &mdash; who agreed to wear devices that measured their movements for seven days. They were followed for about five years. The researchers found that the overall volume of exercise, not necessarily how long or how hard someone exercised in a session, mattered most for longevity.</p>',4,'0','2018-03-02 09:03:50','post_1519977831.jpg','1'),
	(9,'5 Ways to Torch Your Core in Every Workout','<p>At the core of every movement is just that: your core. And while lots of times &ldquo;core&rdquo; and &ldquo;abs&rdquo; become synonymous, it&rsquo;s not 100% correct to use them interchangeably. Your rectus abdominus, transverse abdominus and obliques do comprise your midsection, but those aren&rsquo;t the only muscles involved. Your back, hips and glutes also provide that stable base you need for stepping forward and backward, jumping side-to-side or turning all about. So to get a serious core workout you need to work them all.</p><p>&ldquo;Core strength and stability not only enhances physical and athletic performance, but also helps maintain and correct posture and form, and prevent injury,&rdquo; says Andia Winslow, a Daily Burn Audio Workouts trainer. &ldquo;Those who have an awareness of their core and ability to engage it properly also have enhanced proprioception &mdash; or a sense of the positions of their extremities, without actually seeing them.&rdquo;</p>',4,'0','2018-03-02 09:06:25','post_1519977985.jpg','1');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla quotes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quotes`;

CREATE TABLE `quotes` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`quote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;

INSERT INTO `quotes` (`quote_id`, `quote_title`)
VALUES
	(1,'Pain is weakness leaving the body'),
	(2,'Being defeated is often a temporary condition. Giving up is what makes it permanent'),
	(3,'Failure is only a temporary change in direction to set you straight for your next success'),
	(4,'The worst thing you can be is average'),
	(5,'When it starts to hurt, thats when the set starts'),
	(6,'To achieve something you’ve never had before, you must do something you’ve never done before'),
	(7,'You don’t demand respect, you earn it'),
	(8,'Expecting the world to treat you fairly because you’re an honest person is like expecting the bull not to charge you because you’re a vegetarian'),
	(9,'Be proud, but never satisfied'),
	(10,'Obsession is what lazy people call dedication'),
	(11,'The best way to predict your future is to create it');

/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_port` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_encrypt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_cancel_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_success_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`site_name`, `email_address`, `email_password`, `email_name`, `smtp_host`, `smtp_port`, `smtp_encrypt`, `paypal_email`, `paypal_currency`, `paypal_url`, `paypal_cancel_url`, `paypal_success_url`)
VALUES
	('Encanto','info@example.com','123456789','Encanto Notification','your.host.com','587','tls','example@hotmail.com','USD','https://www.sandbox.paypal.com/cgi-bin/webscr','https://example.com/payment/paypal/cancel.php','https://example.com/payment/paypal/success.php');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla strings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `strings`;

CREATE TABLE `strings` (
  `st_aboutus` text COLLATE utf8_unicode_ci NOT NULL,
  `st_privacypolicy` text COLLATE utf8_unicode_ci NOT NULL,
  `st_termsofservice` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `strings` WRITE;
/*!40000 ALTER TABLE `strings` DISABLE KEYS */;

INSERT INTO `strings` (`st_aboutus`, `st_privacypolicy`, `st_termsofservice`)
VALUES
	('<p><strong>About Us</strong></p><p><em>What is Lorem Ipsum?</em></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><em>Why do we use it?</em></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>','<p><strong>Privacy Policy</strong></p><p><em>What is Lorem Ipsum?</em></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><em>Why do we use it?</em></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>','<p><strong>Terms of Service</strong></p><p><em>What is Lorem Ipsum?</em></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><em>Why do we use it?</em></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>');

/*!40000 ALTER TABLE `strings` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_title` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;

INSERT INTO `tags` (`tag_id`, `tag_title`)
VALUES
	(1,'Motivation'),
	(2,'News'),
	(3,'Fitness'),
	(4,'Tips');

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla we_day1
# ------------------------------------------------------------

DROP TABLE IF EXISTS `we_day1`;

CREATE TABLE `we_day1` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `we_day1` WRITE;
/*!40000 ALTER TABLE `we_day1` DISABLE KEYS */;

INSERT INTO `we_day1` (`exercise_id`, `workout_id`, `day_1`)
VALUES
	(2,16,1),
	(3,16,1),
	(5,16,1),
	(5,15,1),
	(15,15,1),
	(16,15,1),
	(17,15,1),
	(1,14,1),
	(3,14,1),
	(5,14,1),
	(9,14,1),
	(1,13,1),
	(4,13,1),
	(5,13,1),
	(6,13,1),
	(2,12,1),
	(5,12,1),
	(6,12,1),
	(11,12,1),
	(17,12,1),
	(3,11,1),
	(4,11,1),
	(9,11,1),
	(3,10,1),
	(6,10,1),
	(14,10,1),
	(16,10,1),
	(2,9,1),
	(4,9,1),
	(6,9,1),
	(7,9,1),
	(2,8,1),
	(4,8,1),
	(6,8,1),
	(17,8,1),
	(2,7,1),
	(3,7,1),
	(5,7,1),
	(11,7,1),
	(3,6,1),
	(4,6,1),
	(5,6,1),
	(9,6,1),
	(1,5,1),
	(3,5,1),
	(5,5,1),
	(6,5,1),
	(4,4,1),
	(6,4,1),
	(7,4,1),
	(13,4,1),
	(2,3,1),
	(6,3,1),
	(12,3,1),
	(16,3,1),
	(1,2,1),
	(5,2,1),
	(12,2,1),
	(20,2,1),
	(1,1,1),
	(2,1,1),
	(3,1,1),
	(4,1,1);

/*!40000 ALTER TABLE `we_day1` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla we_day2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `we_day2`;

CREATE TABLE `we_day2` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

LOCK TABLES `we_day2` WRITE;
/*!40000 ALTER TABLE `we_day2` DISABLE KEYS */;

INSERT INTO `we_day2` (`exercise_id`, `workout_id`, `day_2`)
VALUES
	(3,15,2),
	(4,15,2),
	(7,15,2),
	(10,15,2);

/*!40000 ALTER TABLE `we_day2` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla we_day3
# ------------------------------------------------------------

DROP TABLE IF EXISTS `we_day3`;

CREATE TABLE `we_day3` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

LOCK TABLES `we_day3` WRITE;
/*!40000 ALTER TABLE `we_day3` DISABLE KEYS */;

INSERT INTO `we_day3` (`exercise_id`, `workout_id`, `day_3`)
VALUES
	(3,16,3),
	(10,16,3),
	(16,16,3),
	(2,14,3),
	(3,14,3),
	(5,14,3),
	(10,14,3),
	(3,13,3),
	(4,13,3),
	(12,13,3),
	(3,12,3),
	(6,12,3),
	(7,12,3),
	(11,12,3),
	(2,11,3),
	(10,11,3),
	(16,11,3),
	(4,10,3),
	(6,10,3),
	(12,10,3),
	(15,10,3),
	(2,9,3),
	(3,9,3),
	(6,9,3),
	(13,9,3),
	(3,8,3),
	(5,8,3),
	(10,8,3),
	(15,8,3),
	(6,7,3),
	(11,7,3),
	(12,7,3),
	(15,7,3),
	(2,6,3),
	(3,6,3),
	(6,6,3),
	(12,6,3),
	(3,5,3),
	(16,5,3),
	(18,5,3),
	(19,5,3),
	(2,4,3),
	(11,4,3),
	(16,4,3),
	(18,4,3),
	(1,3,3),
	(2,3,3),
	(17,3,3),
	(19,3,3),
	(3,2,3),
	(14,2,3),
	(16,2,3),
	(20,2,3),
	(9,1,3),
	(10,1,3),
	(11,1,3),
	(13,1,3);

/*!40000 ALTER TABLE `we_day3` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla we_day4
# ------------------------------------------------------------

DROP TABLE IF EXISTS `we_day4`;

CREATE TABLE `we_day4` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

LOCK TABLES `we_day4` WRITE;
/*!40000 ALTER TABLE `we_day4` DISABLE KEYS */;

INSERT INTO `we_day4` (`exercise_id`, `workout_id`, `day_4`)
VALUES
	(2,15,4),
	(5,15,4),
	(7,15,4),
	(12,15,4);

/*!40000 ALTER TABLE `we_day4` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla we_day5
# ------------------------------------------------------------

DROP TABLE IF EXISTS `we_day5`;

CREATE TABLE `we_day5` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

LOCK TABLES `we_day5` WRITE;
/*!40000 ALTER TABLE `we_day5` DISABLE KEYS */;

INSERT INTO `we_day5` (`exercise_id`, `workout_id`, `day_5`)
VALUES
	(2,16,5),
	(3,16,5),
	(4,16,5),
	(6,14,5),
	(16,14,5),
	(18,14,5),
	(19,14,5),
	(14,13,5),
	(16,13,5),
	(18,13,5),
	(3,12,5),
	(6,12,5),
	(7,12,5),
	(11,12,5),
	(12,11,5),
	(13,11,5),
	(16,11,5),
	(18,11,5),
	(3,10,5),
	(7,10,5),
	(16,10,5),
	(19,10,5),
	(2,9,5),
	(3,9,5),
	(4,9,5),
	(16,9,5),
	(3,8,5),
	(4,8,5),
	(7,8,5),
	(15,8,5),
	(15,7,5),
	(16,7,5),
	(17,7,5),
	(18,7,5),
	(3,6,5),
	(10,6,5),
	(12,6,5),
	(15,6,5),
	(3,5,5),
	(4,5,5),
	(6,5,5),
	(10,5,5),
	(3,4,5),
	(15,4,5),
	(17,4,5),
	(18,4,5),
	(3,3,5),
	(6,3,5),
	(11,3,5),
	(14,3,5),
	(3,2,5),
	(5,2,5),
	(6,2,5),
	(9,2,5),
	(15,1,5),
	(16,1,5),
	(18,1,5),
	(19,1,5);

/*!40000 ALTER TABLE `we_day5` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla we_day6
# ------------------------------------------------------------

DROP TABLE IF EXISTS `we_day6`;

CREATE TABLE `we_day6` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;



# Volcado de tabla we_day7
# ------------------------------------------------------------

DROP TABLE IF EXISTS `we_day7`;

CREATE TABLE `we_day7` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_7` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

LOCK TABLES `we_day7` WRITE;
/*!40000 ALTER TABLE `we_day7` DISABLE KEYS */;

INSERT INTO `we_day7` (`exercise_id`, `workout_id`, `day_7`)
VALUES
	(18,16,7),
	(19,16,7),
	(20,16,7),
	(1,14,7),
	(6,14,7),
	(13,14,7),
	(18,14,7),
	(15,12,7),
	(16,12,7),
	(18,12,7),
	(19,12,7),
	(3,11,7),
	(6,11,7),
	(19,11,7),
	(3,10,7),
	(5,10,7),
	(15,10,7),
	(17,10,7),
	(4,7,7),
	(6,7,7),
	(15,7,7),
	(18,7,7),
	(5,6,7),
	(16,6,7),
	(17,6,7),
	(18,6,7),
	(12,5,7),
	(14,5,7),
	(16,5,7),
	(18,5,7),
	(3,3,7),
	(5,3,7),
	(18,3,7),
	(20,3,7),
	(3,2,7),
	(10,2,7),
	(14,2,7),
	(20,2,7);

/*!40000 ALTER TABLE `we_day7` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla workouts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `workouts`;

CREATE TABLE `workouts` (
  `workout_id` int(11) NOT NULL AUTO_INCREMENT,
  `workout_title` varchar(150) CHARACTER SET latin1 NOT NULL,
  `workout_description` text CHARACTER SET latin1 NOT NULL,
  `workout_goal` int(11) NOT NULL,
  `workout_level` int(11) NOT NULL,
  `workout_duration` varchar(150) CHARACTER SET latin1 NOT NULL,
  `workout_status` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `workout_image` varchar(150) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`workout_id`),
  KEY `FK_workouts_goals` (`workout_goal`),
  KEY `FK_workouts_levels` (`workout_level`),
  CONSTRAINT `FK_workouts_goals` FOREIGN KEY (`workout_goal`) REFERENCES `goals` (`goal_id`),
  CONSTRAINT `FK_workouts_levels` FOREIGN KEY (`workout_level`) REFERENCES `levels` (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `workouts` WRITE;
/*!40000 ALTER TABLE `workouts` DISABLE KEYS */;

INSERT INTO `workouts` (`workout_id`, `workout_title`, `workout_description`, `workout_goal`, `workout_level`, `workout_duration`, `workout_status`, `workout_image`)
VALUES
	(1,'The Ultimate Dumbbell-only Biceps Workout','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',4,2,'3','1','workout_1519944619.jpg'),
	(2,'The 6-week Triphasic Plan for Power','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',4,2,'4','1','workout_1519945666.jpg'),
	(3,'Hardcore CrossFit Workouts','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',3,2,'4','1','workout_1519945022.jpg'),
	(4,'The Sling Shot Bench Press Plan','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',3,3,'3','1','workout_1519945561.jpg'),
	(5,'The Ultimate Bruce Lee Training Program','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',4,3,'4','1','workout_1519945908.jpg'),
	(6,'The 100,000-Pound Challenge','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',2,3,'5','1','workout_1519946537.jpg'),
	(7,'Army Ranger Workout','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',4,4,'4','1','workout_1519947040.jpg'),
	(8,'The Ultimate Conditioning Workout','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',3,3,'3','1','workout_1519947305.jpg'),
	(9,'The 6-Week Fat Blast','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',1,2,'3','1','workout_1519947591.jpg'),
	(10,'The 500-rep Challenge Routine','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',4,4,'4','1','workout_1519948742.jpg'),
	(11,'Ageless Muscle: Total-Body Workout','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',2,4,'4','1','workout_1519948891.jpg'),
	(12,'Level Up Your Triceps Routine','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',2,4,'5','1','workout_1519949368.jpg'),
	(13,'Top It Off With This Full-Body Finisher','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',1,1,'3','1','workout_1519949759.jpg'),
	(14,'Real Man\'s Cardio Workout','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',1,1,'4','1','workout_1519949966.jpg'),
	(15,'The Ultimate Full-Body Landmine Workout','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',1,1,'3','1','workout_1519950276.jpg'),
	(16,'At-Home Cardio for Fat Loss','<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>',3,1,'4','1','workout_1519950433.jpg');

/*!40000 ALTER TABLE `workouts` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
