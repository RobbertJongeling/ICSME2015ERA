#evaluates results of nparcomp in a format of a > b or a < b if significant
reformat <- function (comp, sign) {
  comp <- gsub("p\\( ", "", comp)
  comp <- gsub(" \\)", "", comp)
  comp <- gsub(",", sign, comp)
}

results <- function (c) {
a <- c$Analysis
m <- as.matrix(a)

for(i in 1:nrow(m)) {
    if (m[,"Lower"][i] > 0.5 & m[,"Upper"][i] > 0.5) {
      comp <- (m[,"Comparison"][i])
      comp <- reformat(comp, "<")
      print(comp)
    }
    if (m[,"Lower"][i] < 0.5 & m[,"Upper"][i] < 0.5) {
      comp <- (m[,"Comparison"][i])
      comp <- reformat(comp, ">")
      print(comp)
    }
  }
}
