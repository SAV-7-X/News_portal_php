-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 07:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newzportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(3, 'admin', 'admin@gmail.com', '$2y$10$gNbhUSwBlQ.M10BXprR8Ju/2yi.TEQpJhR.5KJt/qedWXIs7g9DRu', '2024-08-10 07:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `para1` text NOT NULL,
  `para2` text NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `para3` text NOT NULL,
  `para4` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` enum('published','draft') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `image`, `date`, `para1`, `para2`, `subtitle`, `para3`, `para4`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Arshad Nadeems Message To Neeraj Chopra Goes Viral After Historic Gold At Paris Olympics: Dosti Chalti Rahe', 'uploads/AA1ouzwy.jpg', '2024-08-11', 'In a monumental achievement, Pakistan&#39;s Arshad Nadeem won a historic gold medal at the Paris Olympics. Nadeem broke the Olympic record with a throw of 92.97 in his second attempt. He also breached the 90m mark in his final attempt but the second throw was enough for him to bag a first-place finish. Arshad thus became the first athlete in Pakistan&#39;s history to win an Olympic gold medal. This was Pakistan&#39;s fourth gold overall, with the other three coming in Hockey. The gold ended Pakistan&#39;s long wait for an Olympic medal that had eluded the country since Barcelona Summer Games in 1992.', 'Meanwhile, India&#39;s Neeraj Chopra finished second to Nadeem and won a silver medal. Neeraj recorded a throw of 89.45 and had to contend with a second place finish. Neeraj entered the event as defending champion, however, Arshad Nadeem was a notch above the rest.', 'Arshad Nadeem', 'Arshad Nadeem and Neeraj Chopra share a great camaraderie on and off the field. The two athletes have always been effusive in praise for each other. Ahead of the Paris Olympics, Neeraj had made a heartfelt plea after he learned that Arshad was struggling to get a new javelin.', '....', 1, 'published', '2024-08-11 04:48:46', '2024-08-11 05:37:40'),
(3, 'Sega’s delisting Sonic Generations, but somehow doing it in a good way', 'uploads/AA1oxE8d.jpg', '2024-08-11', 'Sega is delisting 2011’s Sonic Generations from Steam and the Xbox Games Store to make way for the game’s upcoming expanded remaster, Sonic X Shadow Generations. But the publisher is taking a rarely seen approach in its plan to remove the original Sonic Generations from sale — it will both delisting the title from sale and make it available for people who really want to purchase it.', 'While the original Sonic Generations will be removed from sale as a stand-alone title on Sept. 9, Sega said Friday that “we’ve heard your feedback, and want to help preserve the game.”', '--------------', '“Therefore, Sonic Generations will still be available via bundles of other iconic Sonic titles on Steam and Xbox,” the publisher said in a post on X (formerly known as Twitter). “Existing owners of the title will still be able to download and play, as well. Lastly, we are happy to confirm that mods on the Steam version will NOT be affected!”', 'The original version of Sonic Generations was pulled from the Xbox store in late July. On Steam, the game is listed under the Sonic Generations Collection, which includes the original game and its Casino Night DLC. It’s not clear which bundle or bundles the original Sonic Generations will be sold through in the future, but the game is also available as part of Sega’s Sonic the Hedgehog: Ultimate Bundle on Steam.', 1, 'published', '2024-08-11 05:03:05', '2024-08-11 05:03:05'),
(4, 'Dravid&#39;s lowest point as India head coach was peak of Kohli transition period: &#39;We lost the series despite being ahead&#39;', 'uploads/AA1oyNPI.jpg', '2024-08-11', 'Rahul Dravid took India to as many as three ICC trophy finals during his tenure as the head coach of the men&#39;s cricket team. And, after the defeats against Australia, both in the title clash for World Test Championship and the ODI World Cup, Dravid ended his stint on a winning note as India clinched the T20 World Cup trophy in June in Barbados, a second multi-nation trophy during his period with the team besides the Asia Cup haul in 2023.', 'However, during his successful tenure, David also experienced some heartbreaks. And while the ODI World Cup final loss at home was expected to top that list, which was India&#39;s only loss in that tournament, the 51-year-old picked the lowest point of his tenure as the opening assignment with the team.\r\n', '--------------', 'In late 2021, following the humiliating group-stage exit in the T20 World Cup, Dravid succeeded Ravi Shastri as the new head coach of the Indian team. The side was going to a major transition amid an off-field turmoil in Indian cricket as Virat Kohli, who had stepped down from the T20I captain role following the World Cup, was removed from the leadership role in ODIs by then BCCI president Sourav Ganguly. The board&#39;s call sparked a war of words between the two stalwarts of Indian cricket, leaving the Indian team in a precarious position as they head to South Africa for a three-match Test series.', '...', 1, 'published', '2024-08-11 05:06:27', '2024-08-11 05:06:27'),
(5, 'Best Isekai Game Anime', 'uploads/AA1mVxMp.jpg', '2024-08-01', 'While not a recent invention, isekai has grown especially popular in manga and anime over the last decade. The success of series like Sword Art Online helped usher in a new era when everyone and, occasionally, their mother is being sent to alternate worlds defined by RPG mechanics. As tired as the formula can get at times, isekai has produced some gems that serve as fantastic wish-fulfillment series.', 'Which are the best isekai game anime? Synonymous as the theme might be with RPGs, only a handful of shows state that they take place within games; however, plenty of anime are set in fantasy worlds built upon traditional gaming conventions.\r\n\r\n', '--------------', 'Updated July 24, 2024 by Mark Sammut: Summer 2024 is a few weeks in by this point, and it has one isekai anime set in a game.', 'Along with quality, the rankings also take into account the importance the isekai anime gives to the &#34;game&#34; aspect of their worlds.', 6, 'published', '2024-08-11 05:10:01', '2024-08-11 05:10:01'),
(6, 'PlayStation Gamer Spammed With Tekken 8 Emails', 'uploads/AA1oACr8.jpg', '2024-08-11', 'PlayStation user spammed with Tekken 8 emails prompts jokes in community, highlighting the controversial game&#39;s history.\r\nTekken 8 faced backlash for introducing in-game purchases, leading to negative reviews and a hit on its Steam badge.\r\nWhile some players mock the spamming incident, others offer advice on managing email preferences to avoid similar situations.\r\nA PlayStation user has been repeatedly spammed with Tekken 8 emails for two consecutive months, forcing them to unsubscribe from the popular newsletter. They then asked the PlayStation community if any other Tekken 8 players had also encountered a similar experience, but they were largely met with a barrage of jokes at their expense.', 'While spamming players with emails every single day is certainly a controversial move, Tekken 8 isn&#39;t shy to a bit of controversy. Despite being one of Metacritic&#39;s highest-rated games of 2024, Tekken 8 was review-bombed just a few months after its release due to Bandai Namco&#39;s decision to add an in-game item shop and battle pass to the hit fighting game. Many players called this &#34;greedy&#34; and took issue with the studio&#39;s lack of communication prior to the update being released, which resulted in the game&#39;s Steam badge slipping to &#34;mostly negative.&#34;', '--------------', 'At Evo 2024, Tekken 8 producer and director Katsuhiro Harada reveals that a fan-favorite character will return to the series as a DLC fighter.', '...', 6, 'published', '2024-08-11 05:12:35', '2024-08-11 05:12:35'),
(7, 'Mario Characters Who Appear In The Most Games', 'uploads/BB1qKcUK.jpg', '2024-07-31', 'There’s no gaming IP as iconic and influential as Nintendo’s Mario series. And not only are these video games incredibly important for the medium, but the characters themselves too, like Bowser, Peach, Luigi, and even the one and only, Mario. Their legacies are so huge that most of them have even gone on to star in spin-off series.', 'Mushrooms have appeared in most every Mario game over the years, becoming one of the plumbers iconic tools. Here are the best Mushrooms in Mario.', '--------------', 'All of this would never have been possible if it wasn’t for the fact the Mario franchise is made up of over 300 different video games, which include mainline titles, sports games, RPGs, and much more. As a result, every single one of those aforementioned characters has made multiple appearances throughout the years, but, there&#39;s only one question left. How do they stack up against each other?', '...', 6, 'published', '2024-08-11 05:14:41', '2024-08-11 05:14:41'),
(8, 'Pokemon Fan Shares Impressive Clay Sculpture of Annihilape', 'uploads/BB1oiZZI.jpg', '2024-08-08', 'The Pokemon franchise has had a thriving fanbase since its inception and one fan has recently demonstrated their fondness for the monster Annihilape by sculpting a replica out of clay. Every Pokemon enthusiast has their favorite pocket monster and the community has spent decades highlighting their in-game companions through fan art, cosplay, and homemade figures.', 'The fandom isn’t afraid to get creative with their craft to produce products for fans in different styles, including one fan who designed Umbreon and Espeon ornaments to sell. There’s something for everyone in the IP, ranging from the classic trading card game to Nintendo’s series of video games, combined with the nine generations of Pokemon compiling over 1000 creatures with unique designs.', '--------------', 'With Pokmon Gen 10 right around the corner, a classic move of the franchise has the perfect chance to be reworked.', 'Posted on the Pokemon subreddit by RedAnihilape, the user shared a sculpture they made of the simian creature, Annihilape. The finished product boasted incredible detail in the monster’s gray fur and captured the Pokemon’s glaring red eyes and pink, button nose. The model was placed upon a circular piece of wood, decorated with fake grass normally applied to Warhammer figures, and completed with a miniature Poke Ball.', 6, 'published', '2024-08-11 05:16:25', '2024-08-11 05:16:25'),
(9, 'Intelligent fish species to keep in home aquariums', 'uploads/blog-03.jpg', '2024-07-12', 'Intelligent fish species to keep in home aquariums', 'Intelligent fish species to keep in home aquariums', '--------------', 'Intelligent fish species to keep in home aquariums', 'Intelligent fish species to keep in home aquariums', 2, 'published', '2024-08-11 05:19:33', '2024-08-11 05:19:33'),
(10, 'Breaking News: Technology Advancements', 'uploads/1.jpg', '2024-08-01', 'Recent advancements in technology have been remarkable...', 'New innovations in AI and robotics are changing industries...', 'The Future of Technology', 'Experts predict that the pace of innovation will continue...', 'Tech companies are racing to develop the next big breakthrough...', 1, 'published', '2024-08-11 07:15:48', '2024-08-11 13:23:14'),
(11, 'Health Tips for a Better Life', 'uploads/2.jpg', '2024-08-02', 'Maintaining a healthy lifestyle is crucial for overall well-being...', 'Diet and exercise play significant roles in health...', 'How to Stay Healthy', 'Experts recommend a balanced diet and regular physical activity...', 'Incorporating these habits into your daily routine can make a difference...', 2, 'published', '2024-08-11 07:15:48', '2024-08-11 13:24:55'),
(13, 'Finance Tips for Saving Money', 'uploads/6.jpg', '2024-08-06', 'Managing your finances effectively can help you save money...', 'Budgeting and investing are key components of financial health...', 'How to Manage Your Money', 'Learn about savings accounts, investments, and budgeting techniques...', 'Start planning your financial future today...', 6, 'published', '2024-08-11 07:20:06', '2024-08-11 13:25:10'),
(14, 'Education News and Updates', 'uploads/7.jpg', '2024-08-07', 'Stay informed about the latest developments in education...', 'New policies and teaching methods are being introduced...', 'Current Trends in Education', 'Educational institutions are adapting to new challenges...', 'Find out how these changes might affect you...', 7, 'published', '2024-08-11 07:20:06', '2024-08-11 13:25:25'),
(15, 'Scientific Discoveries of 2024', 'uploads/8.jpg', '2024-08-08', 'Science continues to push boundaries with new discoveries...', 'From space exploration to medical breakthroughs, there’s much to learn...', 'Latest in Science', 'Explore recent findings and what they mean for the future...', 'Scientists are making strides in various fields...', 8, 'published', '2024-08-11 07:20:06', '2024-08-12 03:16:46'),
(16, 'Political Landscape Changes', 'uploads/9.jpg', '2024-08-09', 'Recent political events are shaping the global landscape...', 'New policies and leaders are emerging...', 'Political News', 'Stay updated on political developments and their impact...', 'Understand the implications of recent changes...', 9, 'published', '2024-08-11 07:20:06', '2024-08-12 03:16:46'),
(17, 'Business Innovations in 2024', 'uploads/10.jpg', '2024-08-10', 'The business world is evolving with new innovations...', 'Companies are adopting new technologies and strategies...', 'Business Trends', 'Discover how these innovations are transforming industries...', 'Stay ahead in the competitive business environment...', 10, 'published', '2024-08-11 07:20:06', '2024-08-12 03:16:46'),
(18, 'Lifestyle Changes for Better Living', 'uploads/11.jpg', '2024-08-11', 'Making lifestyle changes can improve your quality of life...', 'Adopting healthier habits and routines is key...', 'Enhancing Your Lifestyle', 'Find tips and advice on how to live better...', 'Transform your lifestyle with these simple changes...', 11, 'published', '2024-08-11 07:20:06', '2024-08-12 03:16:46'),
(19, 'The Future of Automotive Technology', 'uploads/12.jpg', '2024-08-12', 'Automotive technology is advancing rapidly...', 'Electric vehicles and autonomous driving are at the forefront...', 'Automotive Innovations', 'Explore the latest developments and trends in the automotive industry...', 'How these changes might affect you as a driver...', 12, 'published', '2024-08-11 07:20:06', '2024-08-11 13:23:34'),
(20, 'The Rise of Quantum Computing', 'uploads/t1.jpg', '2024-08-01', 'Quantum computing is rapidly advancing, promising to revolutionize technology...', 'With its potential to solve complex problems, it’s a game-changer for industries...', 'Understanding Quantum Computing', 'Researchers are exploring new algorithms and applications...', 'The future of computing is looking more powerful and efficient...', 8, 'published', '2024-08-11 07:27:59', '2024-08-12 03:16:46'),
(21, 'AI and Machine Learning Innovations', 'uploads/t2.jpg', '2024-08-02', 'Artificial Intelligence continues to evolve with breakthroughs in machine learning...', 'New algorithms are enabling more accurate predictions and automation...', 'AI Advancements', 'Tech companies are investing heavily in AI research...', 'These innovations are reshaping various sectors...', 8, 'published', '2024-08-11 07:27:59', '2024-08-12 03:16:46'),
(22, '5G Technology and Its Impact', 'uploads/t3.jpg', '2024-08-03', '5G networks are rolling out across the globe, offering faster speeds and more connectivity...', 'This technology is set to transform communication and internet services...', 'The Future of Connectivity', 'Explore how 5G will enhance mobile experiences and enable new applications...', 'The rollout is expected to bring significant benefits to users...', 8, 'published', '2024-08-11 07:27:59', '2024-08-12 03:16:46'),
(23, 'The Evolution of Augmented Reality', 'uploads/t4.jpg', '2024-08-04', 'Augmented Reality (AR) technology is becoming more advanced and accessible...', 'AR applications are expanding from gaming to practical uses in various fields...', 'AR Innovations', 'Tech developers are creating new ways to integrate AR into everyday life...', 'Discover the latest trends and applications of AR technology...', 8, 'published', '2024-08-11 07:27:59', '2024-08-12 03:16:46'),
(24, 'Advancements in Cybersecurity', 'uploads/t5.jpg', '2024-08-05', 'As technology advances, so do the methods used by cybercriminals...', 'Cybersecurity experts are developing new strategies to combat these threats...', 'Protecting Digital Assets', 'Stay informed about the latest in cybersecurity trends and techniques...', 'Securing data and systems is more critical than ever...', 8, 'published', '2024-08-11 07:27:59', '2024-08-12 03:16:46'),
(25, 'The Impact of Cloud Computing', 'uploads/t6.jpg', '2024-08-06', 'Cloud computing continues to grow, providing scalable and flexible IT solutions...', 'Businesses are increasingly adopting cloud services for various applications...', 'Cloud Technology Trends', 'Explore the benefits and challenges of cloud computing...', 'The cloud is transforming how businesses operate and manage resources...', 8, 'published', '2024-08-11 07:27:59', '2024-08-12 03:16:46'),
(26, 'Breakthroughs in Semiconductor Technology', 'uploads/t7.jpg', '2024-08-07', 'Semiconductors are at the heart of modern electronics, with new developments driving progress...', 'Recent breakthroughs are enhancing performance and efficiency...', 'Semiconductor Innovations', 'Find out how advancements are impacting various technologies...', 'These innovations are crucial for the future of electronic devices...', 8, 'published', '2024-08-11 07:27:59', '2024-08-12 03:16:46'),
(27, 'The Future of Wearable Technology', 'uploads/t8.jpg', '2024-08-08', 'Wearable technology is becoming more sophisticated, offering new functionalities...', 'From fitness trackers to smartwatches, the market is expanding...', 'Wearable Tech Trends', 'Discover the latest advancements and potential future developments...', 'Wearable tech is set to play a larger role in personal health and connectivity...', 8, 'published', '2024-08-11 07:27:59', '2024-08-12 03:16:46'),
(28, 'Exploring Blockchain Technology', 'uploads/t9.jpg', '2024-08-09', 'Blockchain technology is gaining attention for its potential to transform various industries...', 'It’s not just about cryptocurrencies but also secure data management...', 'Blockchain Insights', 'Learn about the applications and benefits of blockchain technology...', 'The technology promises increased transparency and security...', 8, 'published', '2024-08-11 07:27:59', '2024-08-12 03:16:46'),
(29, 'Robotics in Modern Manufacturing', 'uploads/t10.jpg', '2024-08-10', 'Robotics is revolutionizing manufacturing processes, increasing efficiency and precision...', 'New advancements are enabling more automated and flexible production lines...', 'The Role of Robotics', 'Explore how robotics are changing the manufacturing landscape...', 'The future of production is becoming increasingly automated...', 8, 'published', '2024-08-11 07:27:59', '2024-08-12 03:16:46'),
(31, 'Advancements in Virtual Reality', 'uploads/t12.jpg', '2024-08-12', 'Virtual Reality (VR) technology is advancing with more immersive experiences...', 'New VR applications are emerging in gaming, education, and beyond...', 'The VR Revolution', 'Explore how VR is transforming various industries and applications...', 'The future of VR holds exciting possibilities for users...', 8, 'published', '2024-08-11 07:27:59', '2024-08-12 03:16:46'),
(32, 'The Future of Online Education', 'uploads/e1.jpg', '2024-08-01', 'Online education is evolving with new technologies and methods...', 'Virtual classrooms and interactive learning are becoming more prevalent...', 'Transforming Education', 'Explore the benefits and challenges of online learning...', 'The future of education is increasingly digital...', 2, 'published', '2024-08-11 07:36:06', '2024-08-12 03:16:46'),
(33, 'Innovative Teaching Methods in 2024', 'uploads/e2.jpg', '2024-08-02', 'New teaching methods are emerging to enhance student engagement...', 'Technologies such as AR and VR are being integrated into curricula...', 'Teaching Innovations', 'Find out how educators are adapting to new tools and techniques...', 'Education is becoming more interactive and immersive...', 2, 'published', '2024-08-11 07:36:06', '2024-08-12 03:16:46'),
(34, 'The Impact of AI on Education', 'uploads/e3.jpg', '2024-08-03', 'Artificial Intelligence is transforming the educational landscape...', 'AI tools are being used to personalize learning experiences...', 'AI in Education', 'Explore how AI is reshaping teaching and learning processes...', 'The integration of AI promises significant advancements...', 2, 'published', '2024-08-11 07:36:06', '2024-08-12 03:16:46'),
(35, 'Advances in Educational Technology', 'uploads/e4.jpg', '2024-08-04', 'Educational technology is advancing with new software and platforms...', 'From e-books to learning management systems, the tools are evolving...', 'Tech in the Classroom', 'Learn about the latest technological trends in education...', 'Technology is enhancing the learning experience for students...', 2, 'published', '2024-08-11 07:36:06', '2024-08-12 03:16:46'),
(36, 'The Rise of Gamification in Education', 'uploads/e5.jpg', '2024-08-05', 'Gamification is becoming a popular approach to engage students...', 'Educational games and rewards are being used to motivate learners...', 'Learning Through Play', 'Discover how gamification is changing the educational landscape...', 'The approach is making learning more fun and interactive...', 2, 'published', '2024-08-11 07:36:06', '2024-08-12 03:16:46'),
(37, 'Trends in Student Assessment', 'uploads/e6.jpg', '2024-08-06', 'Student assessment methods are evolving with new evaluation techniques...', 'There’s a shift towards more comprehensive and continuous assessment...', 'Assessment Evolution', 'Learn about the new approaches to evaluating student performance...', 'Assessment practices are becoming more holistic and flexible...', 2, 'published', '2024-08-11 07:36:06', '2024-08-12 03:16:46'),
(38, 'The Role of Virtual Reality in Education', 'uploads/e7.jpg', '2024-08-07', 'Virtual Reality is offering immersive learning experiences...', 'From virtual field trips to interactive simulations, VR is enhancing education...', 'VR Learning', 'Explore how VR is being used to create engaging educational content...', 'The technology is making learning more engaging and experiential...', 2, 'published', '2024-08-11 07:36:06', '2024-08-12 03:16:46'),
(39, 'Educational Podcasts and Their Benefits', 'uploads/e8.jpg', '2024-08-08', 'Podcasts are becoming a valuable educational resource...', 'They offer a flexible way to learn about various topics on the go...', 'Learning Through Podcasts', 'Discover the advantages of incorporating podcasts into learning...', 'Educational podcasts are a convenient and engaging way to gain knowledge...', 2, 'published', '2024-08-11 07:36:06', '2024-08-12 03:16:46'),
(40, 'The Importance of Digital Literacy in Education', 'uploads/e9.jpg', '2024-08-09', 'Digital literacy is crucial for navigating the modern educational environment...', 'Students need skills to effectively use digital tools and resources...', 'Building Digital Skills', 'Learn about the importance of digital literacy and how it’s being taught...', 'Empowering students with digital skills is essential for their success...', 2, 'published', '2024-08-11 07:36:06', '2024-08-12 03:16:46'),
(41, 'Innovations in E-Learning Platforms', 'uploads/e10.jpg', '2024-08-10', 'E-learning platforms are introducing new features to enhance online education...', 'These innovations are making learning more accessible and interactive...', 'E-Learning Advancements', 'Explore the latest updates and features in e-learning platforms...', 'The platforms are evolving to better meet the needs of learners...', 2, 'published', '2024-08-11 07:36:06', '2024-08-12 03:16:46'),
(42, 'The Impact of Social Media on Education', 'uploads/e11.jpg', '2024-08-11', 'Social media is influencing education in various ways...', 'It’s used for communication, collaboration, and learning opportunities...', 'Social Media Trends', 'Discover how social media is affecting educational practices...', 'The role of social media in education is expanding and evolving...', 2, 'published', '2024-08-11 07:36:06', '2024-08-12 03:16:46'),
(43, 'The Role of Artificial Intelligence in Educational Content Creation', 'uploads/e12.jpg', '2024-08-12', 'AI is increasingly being used to create and curate educational content...', 'It helps in generating personalized learning materials and assessments...', 'AI-Driven Content Creation', 'Learn about the impact of AI on creating educational resources...', 'AI is shaping the future of educational content and resource development...', 2, 'published', '2024-08-11 07:36:06', '2024-08-12 03:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sports', 'News related to sports\r\n', '2024-08-10 10:29:51', '2024-08-10 10:29:51'),
(2, 'Education', 'News related to education', '2024-08-10 10:33:16', '2024-08-10 10:33:16'),
(6, 'Games', 'News related to games \r\n', '2024-08-11 05:03:37', '2024-08-11 05:03:37'),
(7, 'Anime', 'News related to anime\r\n', '2024-08-11 05:10:21', '2024-08-11 05:10:21'),
(8, 'Technology', 'Latest news and updates in technology.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(9, 'Health', 'Tips and news on health and wellness.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(10, 'Sports', 'All about your favorite sports and teams.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(11, 'Entertainment', 'Movies, music, and celebrity news.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(12, 'Travel', 'Destinations, tips, and travel guides.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(13, 'Finance', 'Financial news, advice, and tips.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(14, 'Education', 'News and updates about education.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(16, 'Politics', 'Political news and analysis.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(17, 'Business', 'Business news and insights.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(18, 'Lifestyle', 'Trends and advice on lifestyle topics.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(19, 'Food', 'Recipes, food news, and dining tips.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(20, 'Culture', 'Cultural events and news.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(21, 'Art', 'Latest news in the art world.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(22, 'Fashion', 'Fashion trends and style tips.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(23, 'Music', 'Music news and artist updates.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(24, 'Movies', 'Latest movie releases and reviews.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(25, 'Gaming', 'Video game news and reviews.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(26, 'Fitness', 'Workouts, fitness tips, and health advice.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(27, 'Environment', 'News and updates about the environment.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(28, 'Home', 'Home improvement and decor tips.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(29, 'Automotive', 'Latest news in the automotive industry.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(30, 'Books', 'Book reviews and literary news.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(31, 'Gardening', 'Tips and news on gardening and plants.', '2024-08-11 07:09:12', '2024-08-11 07:09:12'),
(33, 'Pets', 'Pet care tips and news.', '2024-08-11 07:09:12', '2024-08-11 07:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `parent_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cricket', 'News related to cricket', '2024-08-10 10:52:48', '2024-08-10 10:52:48'),
(2, 2, 'NEET', 'News related to neet', '2024-08-10 10:59:16', '2024-08-10 10:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_parent_id` (`parent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
