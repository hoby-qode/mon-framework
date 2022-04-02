/*fake data post */
INSERT INTO `post` ( `name`, `content`, `slug`, `created_at`) VALUES
('Article 1', 'lorem lorem lorem lorem lorem ','article-1', '2021-01-10'),
('Article 2', 'lorem lorem lorem lorem lorem ','article-2', '2021-02-20'),
('Article 3', 'lorem lorem lorem lorem lorem ','article-3', '2021-03-03'),
('Article 5', 'lorem lorem lorem lorem lorem ','article-5', '2021-04-04'),
('Article 6', 'lorem lorem lorem lorem lorem ','article-6', '2021-05-05'),
('Article 7', 'lorem lorem lorem lorem lorem ','article-7', '2021-06-06'),
('Article 8', 'lorem lorem lorem lorem lorem ','article-8', '2021-07-07'),
('Article 9', 'lorem lorem lorem lorem lorem ','article-9', '2021-08-08'),
('Article 10', 'lorem lorem lorem lorem lorem ','article-10', '2021-09-09'),
('Article 11', 'lorem lorem lorem lorem lorem ','article-11', '2021-10-10'),
('Article 12', 'lorem lorem lorem lorem lorem ','article-12', '2021-11-11'),
('Article 13', 'lorem lorem lorem lorem lorem ','article-13', '2021-12-12'),
('Article 14', 'lorem lorem lorem lorem lorem ','article-14', '2021-03-13'),
('Article 15', 'lorem lorem lorem lorem lorem ','article-15', '2021-05-14'),
('Article 16', 'lorem lorem lorem lorem lorem ','article-16', '2021-04-15'),
('Article 17', 'lorem lorem lorem lorem lorem ','article-17', '2021-02-16'),
('Article 18', 'lorem lorem lorem lorem lorem ','article-18', '2021-06-17'),
('Article 19', 'lorem lorem lorem lorem lorem ','article-19', '2021-05-18'),
('Article 20', 'lorem lorem lorem lorem lorem ','article-20', '2021-01-19');

/*fake data category */
INSERT INTO `category` (`name`, `slug`) VALUES
('Categorie 1','categorie-1'),
('Categorie 3','categorie-3'),
('Categorie 4','categorie-4'),
('Categorie 5','categorie-5'),
('Categorie 6','categorie-6'),
('Categorie 7','categorie-7'),
('Categorie 8','categorie-8'),
('Categorie 9','categorie-9'),
('Categorie 10','categorie-10');

/*fake data post_category*/
INSERT INTO `post_category` (`post_id`, `category_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3),
(4, 4),
(5, 4),
(5, 5),
(6, 5),
(7, 6),
(8, 8);

/*fake data user */
INSERT INTO `user` ( `username`, `password`) VALUES
('userAdmin','userAdmin'),
('userSuperAdmin','userSuperAdmin'),
('client','client');