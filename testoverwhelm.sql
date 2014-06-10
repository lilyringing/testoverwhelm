-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--

-- 主機: 127.0.0.1
-- 產生日期: 2014 年 06 月 09 日 20:32
-- 伺服器版本: 5.5.32
-- PHP 版本: 5.4.27


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `testoverwhelm`
--

-- --------------------------------------------------------

--
-- 資料表結構 `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `answerid` int(11) NOT NULL AUTO_INCREMENT,
  `questionid` int(11) NOT NULL,
  `answer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `good` int(10) unsigned NOT NULL DEFAULT '0',
  `bad` int(10) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`answerid`),
  KEY `question_id` (`questionid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- 資料表的匯出資料 `answer`
--

INSERT INTO `answer` (`answerid`, `questionid`, `answer`, `good`, `bad`, `userid`, `updatetime`) VALUES
(2, 3, 'R0 → ε | 0R1 | 1R2\r\nR1 → ε | 0R1 | 1R3\r\nR2 → ε | 0R4 | 1R2\r\nR3 → ε | 1R4\r\nR4 → ε | 0R3\r\n(Note: useless production rules have been removed.)', 0, 1, 1, '2014-06-07 01:13:25'),
(3, 3, 'test', 0, 1, 2, '2014-06-07 05:20:44'),
(4, 1, 'D:/xampp/htdocs/Github/testoverwhelm/upload/TC20131A1.PNG', 1, 0, 1, '2014-06-07 10:15:46'),
(5, 1, 'This is a test for the text answer of problem 1.', 0, 0, 1, '2014-06-08 04:38:20'),
(6, 1, 'D:/xampp/htdocs/Github/testoverwhelm/upload/TC20131A2.PNG', 0, 0, 1, '0000-00-00 00:00:00'),
(7, 2, '<h1> hack </h1>', 0, 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `fileid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`commentid`),
  KEY `fileid` (`fileid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 資料表的匯出資料 `comment`
--

INSERT INTO `comment` (`commentid`, `fileid`, `userid`, `comment`, `updatetime`) VALUES
(1, 1, 1, 'Theroy of computing is really hard!!!', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `fileid` int(11) NOT NULL AUTO_INCREMENT,
  `timeid` int(5) NOT NULL,
  `subject` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `professor` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`fileid`),
  KEY `fileid` (`fileid`),
  KEY `userid` (`userid`),
  KEY `subject` (`subject`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 資料表的匯出資料 `file`
--

INSERT INTO `file` (`fileid`, `timeid`, `subject`, `professor`, `userid`, `updatetime`) VALUES
(1, 10121, '計算理論', '蔡益坤', 1, '0000-00-00 00:00:00'),
(2, 10021, '演算法', '蔡益坤', 1, '0000-00-00 00:00:00'),
(3, 9211, '計算機組織與結構', '陳炳宇', 1, '2014-06-09 03:59:21');

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- 資料表結構 `question`
=======
-- 表的結構 `keyword`
--

CREATE TABLE IF NOT EXISTS `keyword` (
  `subject` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject_nickname` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`subject`,`subject_nickname`),
  KEY `subject` (`subject`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 轉存資料表中的資料 `keyword`
--

INSERT INTO `keyword` (`subject`, `subject_nickname`) VALUES
('演算法', 'Algorithm'),
('演算法', '演算法'),
('計算機組織與結構', '計算機組織與結構'),
('計算機組織與結構', '計組'),
('計算理論', 'Theory of computing'),
('計算理論', '計理'),
('計算理論', '計算理論');

-- --------------------------------------------------------

--
-- 表的結構 `question`
>>>>>>> 5ca172de1b1ffd62f4737583c9f06ec8f4d5abe4
--

CREATE TABLE IF NOT EXISTS `question` (
  `questionid` int(11) NOT NULL AUTO_INCREMENT,
  `fileid` int(11) NOT NULL,
  `question` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`questionid`),
  KEY `fileid` (`fileid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- 資料表的匯出資料 `question`
--

INSERT INTO `question` (`questionid`, `fileid`, `question`, `number`) VALUES
(1, 1, 'Let A = {a, b, c, d, e, f} and R = {(a, c), (b, c), (d, e)} (which is a binary relation on A).\r\n(a) Give a symmetric and transitive but not reﬂexive binary relation on A that includes\r\nR. Please present the relation using a directed graph.\r\n(b) Find the smallest equivalence relation on A that includes R. Please present the\r\nrelation using a directed graph.', 1),
(2, 1, 'Let L = {w ∈ {0, 1}∗ | w contains 011 as a substring or ends with a 0}.\n(a) Draw the state diagram of an NFA, with as few states as possible, that recognizes\nL. The fewer states your NFA has, the more points you will be credited for this\nproblem.\n(b) Convert the preceding NFA systematically into an equivalent DFA (using the proce-\ndure discussed in class). Do not attempt to optimize the number of states, though\nyou may omit the unreachable states.', 2),
(3, 1, 'Let L = {w ∈ {0, 1}∗ | w does not contain 011 or 100 as a substring}.\r\n(a) Draw the state diagram of a DFA, with as few states as possible, that recognizes\r\nL. The fewer states your DFA has, the more points you will be credited for this\r\nproblem.\r\n(b) Translate the DFA in (a) systematically to an equivalent context-free grammar (using\r\nthe procedure discussed in class).', 3),
(4, 1, 'Let L = {1^p | p is a prime number less than 2^2^10}. Is L a regular language? Why or why not?', 4),
(5, 1, 'Let Cn = {x | x is a binary number that is a multiple of n}. Show that for each n ≥ 1,the language Cn is regular.', 5),
(6, 1, 'A synchronizing sequence for a DFA M = (Q, Σ, δ, q0, F) and some “home” state h ∈ Q is a string s ∈ Σ∗ such that, for every q ∈ Q, δ(q, s) = h. A DFA is said to be synchronizable if it has a synchronizing sequence for some state. Try to ﬁnd a 5-state synchronizable DFA over the alphabet {0, 1} with a synchronizing sequence as long as possible. What is the longest synchronizing sequence for the DFA and which state is the corresponding home state? The longer the synchronizing sequence is, the more points you will be credited for this problem. (Note: the synchronizing sequence we seek should be minimal in the sense that none of its proper substrings is also a synchronizing sequence.)', 6),
(7, 1, 'Draw the state diagram of a pushdown automaton (PDA) that recognizes the following language: {w ∈ {a, b, c}∗ | the number of a’s in w equals that of b’s or c’s}. Please make the PDA as simple as possible and explain the intuition behind the PDA.', 7),
(8, 1, 'Let A/B = {w | wx ∈ A for some x ∈ B}. Show that, if A is context free and B is regular, then A/B is context free.', 8),
(9, 1, 'Show that, if G is a CFG in Chomsky normal form, then any string w ∈ L(G) of length n ≥ 1, exactly 2n − 1 steps are required for any derivation of w.', 9),
(10, 1, 'Prove that the language over {a, b, c} with equal numbers of a’s, b’s, and c’s is not context free.', 10),
(11, 2, 'Consider the geometric series: 1, 2, 4, 8, 16, . . .. Prove by induction that any positive integer can be written as a sum of distinct numbers from this series.', 1),
(12, 2, 'Consider a round-robin tournament among n players. In the tournament, each player plays once against all other n−1 players. There are no draws, i.e., for a match between A and B, the result is either A beat B or B beat A. Prove by induction that, after a round-robin tournament, it is always possible to arrange the n players in an order p_1, p_2, · · · , p_n\r\nsuch that p_1 beat p_2, p_2 beat p_3, · · ·, and p_n−1 beat pn. (Note: the “beat” relation, unlike “≥”, is not transitive.)', 2),
(13, 2, 'Show all intermediate and the ﬁnal AVL trees formed by inserting the numbers 4, 5, 6, 1, 2, and 3 (in this order) into an empty tree. Please use the following ordering convention: the key of an internal node is larger than that of its left child and smaller than that of\r\nits right child. If re-balancing operations are performed, please also show the tree before re-balancing and indicate what type of rotation is used in the re-balancing.', 5),
(15, 2, 'The input is a set S with n real numbers. Design an O(n) time algorithm to ﬁnd a number that is not in the set. Prove that Ω(n) is a lower bound on the number of steps required to solve this problem.', 6),
(16, 2, 'Let x_1, x_2, · · · , x_2n−1, x_2n be a sequence of 2n real numbers. Design an algorithm to partition the numbers into n pairs such that the maximum of the n sums of pair is minimized. It may be intuitively easy to get a correct solution. You must explain how the algorithm can be designed using induction.', 7),
(17, 2, 'Apply the Quicksort algorithm to the following array. Show the contents of the array after each partition operation. If you use a diﬀerent partition algorithm (from the one discussed in class), please describe it.\r\n1 2 3 4 5 6 7 8 9 10 11 12\r\n10 9 4 7 12 6 8 2 1 11 5 3', 8),
(18, 2, 'Prove that the sum of the heights of all nodes in a complete binary tree with n nodes is at most n − 1. You may assume it is known that the sum of the heights of all nodes in a full binary tree of height h is 2^(h+1) − h − 2. (Note: a single-node tree has height 0.)', 10),
(19, 3, '(30%) A majority function is generated in a combinational circuit when the output is equal to 1 if the input variables have more 1’s than 0’s. The output is 0 otherwise.\r\na. (10%) Please write the truth table for a 4-input majority function F.\r\nb. (10%) Please use the Karnaugh map to find the minimum sum of products form for F and the minimum sum of products form for F’.\r\nc. (10%) Please draw the logic schematic for F by using AND, OR, and INVERT gates.\r\n', 1),
(20, 3, '(10%) Prove the following simplification theorems using the first eight laws of Boolean algebra:\r\na. (5%) Y X XZ Z X Y X + = + + ) )( (\r\nb. (5%) Z X XY Z X YZ XY + = + +\r\n', 2),
(21, 3, '(10%) The table below shows the number of floating-point operations executed in two different programs and the runtime for those programs on three different achines: Execution time in seconds Program Floating-point operations Computer A Computer B Computer C\r\nProgram 1 10,000,000 1 10 20\r\nProgram 2 100,000,000 1000 100 20\r\na. (5%) Which machine is fastest according to total execution time?\r\nb. (5%) How much faster is it than the other two machines?\r\n', 3),
(22, 3, '(10%) You are going to enhance a machine, and there are two possible improvements: either make multiply instructions run four times faster than before, or make memory access instructions run two times faster than before. You repeatedly run a program that takes 100 seconds to execute. Of this time, 20% is used for multiplication, 50% for memory access instructions, and 30% for other tasks.\r\na. (3%) What will the speedup be if you improve only multiplication?\r\nb. (3%) What will the speedup be if you improve only memory access?\r\nc. (4%) What will the speedup be if both improvements are made?\r\n', 4),
(23, 3, '(10%) The following code fragment processes two arrays. Assume that the base address of the first array is stored in $a0 and the base address of the second array is stored in $a1.\r\nsub $sp, $sp, 4\r\nsw $s0, 0($sp)\r\nadd $s0, $zero, $zero\r\nJohn: add $t1, $a1, $s0\r\nlb $t2, 0($t1)\r\nadd $t3, $a0, $s0\r\nsb $t2, 0($t3)\r\nbeq $t2, $zero, Mary\r\nadd $s0, $s0, 1\r\nj John\r\nMary: lw $s0, 0($sp)\r\nadd $sp, $sp, 4\r\njr $ra\r\na. (5%) Please write the comment for each code fragment line and describe what this code does.\r\nb. (5%) Assume that the size of the two arrays are both 60,000 and the code is run on a machine with 60 MHz clock that requires the following number of cycles for each instruction. In the worst case, how many seconds will it take to execute this code?\r\nInstruction Cycles\r\nadd, sub 2\r\nlw, sw, lb, sb, beq, j, jr 3\r\n', 5),
(24, 3, '(10%) Consider the following fragment of C code:\r\nfor (i = 0; i <= 200; i = i + 1) { a[i] = b[i] + c[i]; }\r\nAssume that a and b are arrays of words and the base address of a is in $a0, the base address of b is in $a1, and the base address of c is in $a2. Register $t0 is associated with the variable i.\r\na. (6%) Please write the code for MIPS and write the comment for each MIPS statement.\r\nb. (2%) How many instructions are executed during the running of this code?\r\nc. (2%) How many memory data references will be made during the execution?\r\n', 6),
(25, 3, '(10%) IEEE 754 is a floating-point standard.\r\na. (5%) Please show the IEEE 754 binary representation for the floating-point number\r\n-0.4375ten in single precision.\r\nb. (5%) Please convert the following IEEE 754 binary representation in single\r\nprecision to the decimal number: 1011 1111 1100 0000 0000 0000 0000 0000.\r\n', 7),
(26, 3, '(10%) The ALU supported set on less than (slt) using just the sign bit of the adder. Let’s try a set on less than operation using the values -7ten and 6ten. To make it simpler to follow the example, let’s limit the binary representations to 4 bits: 1001two and 0110two.\r\n1001two – 0110two = 1001two + 1010two = 0011two\r\nThis result would suggest that -7ten > 6ten, which is clearly wrong. Hence we must factor in overflow in the decision. Modify the 1-bit ALU in the following figures to handle slt correctly. (You can just write on the next page and deliver it with your answer papers.)\r\n0\r\n1\r\na\r\nb\r\nresult\r\noperation\r\n+ 2\r\ncin\r\ncout\r\n0\r\n1\r\nbinvert\r\nless 3\r\nFigure 1: A 1-bit ALU that performs AND, OR, and addition on a and b or b’.\r\n0\r\n1\r\na\r\nb\r\nresult\r\noperation\r\n+ 2\r\ncin\r\n0\r\n1\r\nbinvert\r\nless 3\r\noverflow\r\ndetection\r\noverflow\r\nset\r\nFigure 2: A 1-bit ALU for the most significant bit.', 8);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `userid` (`userid`),
  KEY `userid_2` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`userid`, `account`, `password`) VALUES
(1, 'Lily', '0000'),
(2, 'Johnny', 'johnny');

-- --------------------------------------------------------

--
-- 資料表結構 `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `userid` int(11) NOT NULL,
  `answerid` int(11) NOT NULL,
  `gb` tinyint(1) NOT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`,`answerid`),
  KEY `userid` (`userid`),
  KEY `answerid` (`answerid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `vote`
--

INSERT INTO `vote` (`userid`, `answerid`, `gb`, `updatetime`) VALUES
(1, 2, 0, '0000-00-00 00:00:00'),
(1, 3, 0, '0000-00-00 00:00:00'),
(1, 4, 1, '2014-06-09 07:02:01'),
(1, 7, 0, '0000-00-00 00:00:00');

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `question_id` FOREIGN KEY (`questionid`) REFERENCES `question` (`questionid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `file_id` FOREIGN KEY (`fileid`) REFERENCES `file` (`fileid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `user_id3` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `file_id2` FOREIGN KEY (`fileid`) REFERENCES `file` (`fileid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`answerid`) REFERENCES `answer` (`answerid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
