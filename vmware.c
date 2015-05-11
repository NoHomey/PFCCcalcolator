#include <stdio.h>
#include <curl/curl.h>
#include <string.h>
#include <stdlib.h>
#include <stdbool.h>
#include <pthread.h>
#include <time.h>
char* post_url[10] = {"http://172.16.24.129:8080/api/sector/1/company/I<2wining/trajectory",
"http://172.16.24.129:8080/api/sector/2/company/I<2wining/trajectory",
"http://172.16.24.129:8080/api/sector/3/company/I<2wining/trajectory",
"http://172.16.24.129:8080/api/sector/4/company/I<2wining/trajectory",
"http://172.16.24.129:8080/api/sector/5/company/I<2wining/trajectory",
"http://172.16.24.129:8080/api/sector/6/company/I<2wining/trajectory",
"http://172.16.24.129:8080/api/sector/7/company/I<2wining/trajectory",
"http://172.16.24.129:8080/api/sector/8/company/I<2wining/trajectory",
"http://172.16.24.129:8080/api/sector/9/company/I<2wining/trajectory",
"http://172.16.24.129:8080/api/sector/10/company/I<2wining/trajectory"};

struct MemoryStruct {
  char *memory;
  size_t size;
};

struct MemoryStruct get_es[10];
struct MemoryStruct get_rs[10];

inline void p_cpy(char* dst, char* src, size_t len) {
  size_t i;
  for (i=0; i<len; i++) dst[i] = src[i];
}

inline void my_cpy(char* dst, char* src) {
  dst[0] = src[0];
  dst[1] = src[1];
  dst[2] = src[2];
  dst[3] = src[3];
}

inline size_t str_cpy(char* dst, char* src) {
  size_t i = 0;
  while( (src[i] >= '0') && (src[i] <= '9') ) {
    dst[i] = src[i];
    i++;
    if(i==4) break;
  }
  return i;
}

inline size_t WriteMemoryCallback(void *contents, size_t size, size_t nmemb, void *userp) {
  size_t realsize = size * nmemb;
  struct MemoryStruct *mem = (struct MemoryStruct *)userp;
  mem->memory = (char*)realloc(mem->memory, mem->size + realsize + 1);
  p_cpy(&(mem->memory[mem->size]), (char*)contents, realsize);
  mem->size += realsize;
  mem->memory[mem->size] = 0;
  return realsize;
}

inline bool equal(char* ptr1, char* ptr2) {
  return ((ptr1[0] == ptr2[0]) && (ptr1[1] == ptr2[1]) && (ptr1[2] == ptr2[2]) && (ptr1[3] == ptr2[3]));
}

inline void remove_edge(char** tar) {
  tar[0][0] = tar[1][0] = '\0';
  tar[0][1] = tar[1][1] = '\0';
  tar[0][2] = tar[1][2] = '\0';
  tar[0][3] = tar[1][4] = '\0';
}

inline void remove_elem(char* tar, char** from, size_t len) {
  size_t i;
  for(i = 0; i < len; i++) {
    if(equal(tar, from[i])) {
      from[i][0] = '\0';
      from[i][1] = '\0';
      from[i][2] = '\0';
      from[i][3] = '\0';
      return;
    }
  }
}

inline bool not_in(char* search, char** where, size_t len) {
  size_t i;
  for(i = 0; i < len; i++) {
    if(equal(search, where[i])) return false;
  }
  return true;
}

inline size_t init (char* tar, char* chil, char* per) {
  tar[0] = 't';
  tar[1] = 'r';
  tar[2] = 'a';
  tar[3] = 'j';
  tar[4] = 'e';
  tar[5] = 'c';
  tar[6] = 't';
  tar[7] = 'o';
  tar[8] = 'r';
  tar[9] = 'y';
  tar[10] = '=';
  size_t pos = str_cpy(tar + 11, chil);
  pos += 11;
  tar[pos++] = ' ';
  return pos + str_cpy(tar + pos, per);
}

inline size_t inc_traject(char* tar, char* node, size_t pos) {
  tar[pos++] = ' ';
  return pos + str_cpy(tar + pos, node);
}

inline size_t init_single (char* tar, char* node) {
  tar[0] = 't';
  tar[1] = 'r';
  tar[2] = 'a';
  tar[3] = 'j';
  tar[4] = 'e';
  tar[5] = 'c';
  tar[6] = 't';
  tar[7] = 'o';
  tar[8] = 'r';
  tar[9] = 'y';
  tar[10] = '=';
  return 11 + str_cpy(tar + 11, node);
}

inline void sort(size_t* srt, size_t* lens, size_t len) {
   size_t i, k;
   size_t len_h, index_h;
   for(i = 0; i < len; i++) {
     for(k = 0; k < len - 1; k++) {
       if(lens[k] < lens[k+1]) {
         len_h = lens[k+1];
         lens[k+1] = lens[k];
         lens[k] = len_h; 
         index_h = srt[k+1];
         srt[k+1] = srt[k];
         srt[k] = index_h;
       }
     }
   }
}

inline void* thread(void* n) {
  size_t* p = (size_t*)n;
  size_t i;
  size_t k = 0;
  size_t l = 0;
  size_t flag;
  size_t rs_len = 0;
  size_t es_len = 0;
  size_t fs_len = 0;
  size_t ce_len = 0;
  size_t ns_len = 0;
  size_t ts_len = 0;
  size_t scharp = sizeof(char*);
  size_t ssizet = sizeof(size_t);
  size_t founds[2000];
  size_t* lens = (size_t*)calloc(800, ssizet);
  size_t* sorted = (size_t*)calloc(800, ssizet);
  char* perent = (char*)calloc(1, 1);
  char** roots = (char**)calloc(1000, scharp);
  char** cycle = (char**)calloc(1000, scharp);
  char** nodes = (char**)calloc(1000, scharp);
  char*** edges = (char***)calloc(2000, sizeof(char**));
  char** trajects = (char**)calloc(800, scharp);
  for(i = 0;i<1000;i++) {
    roots[i] = (char*)calloc(4, 1);
    cycle[i] = (char*)calloc(4, 1);
    nodes[i] = (char*)calloc(4, 1);
   }
  for(i = 0;i<2000;i++) {
    edges[i] = (char**)calloc(2, scharp);
    edges[i][0] = (char*)calloc(4, 1); 
    edges[i][1] = (char*)calloc(4, 1);
  }
  for(i = 0;i<800;i++) trajects[i] = (char*)calloc(1500, 1); 
  i = k = 0;
  while(i < get_rs[*p].size - 1) {
   if(get_rs[*p].memory[i] == '\n') {
      k = 0;
      rs_len++;
   } else {
     roots[rs_len][k] = get_rs[*p].memory[i];
     k++;
   } 
    i++;  
  }
  i = k = l = 0;
  while(i < get_es[*p].size - 1) {
   if(get_es[*p].memory[i] == '\n') {
      k = l = 0;
      es_len++;
   } else {
     if(get_es[*p].memory[i] == ' ') {
       k = 1;
       l = 0;
     } else {
       edges[es_len][k][l] = get_es[*p].memory[i];
       l++;
     }
   } 
    i++;  
  }
  rs_len++;
  es_len++;
  for(ce_len = 0; ce_len < rs_len;ce_len++) my_cpy(cycle[ce_len], roots[ce_len]);
  fs_len = 1;
  while(fs_len > 0) {
    fs_len = 0;
    for(i = 0; i < es_len;i++) {
      for(k = 0; k < ce_len;k++) {
        if((equal(edges[i][0], cycle[k]))){
          founds[fs_len++] = i;
          break;
        }
      }
    }
    ce_len = 0;
    for(i=0; i < fs_len;i++) {
       if (not_in(edges[founds[i]][1], cycle, ce_len)) {
         my_cpy(cycle[ce_len], edges[founds[i]][1]);
         ce_len++;
       }
       if (not_in(edges[founds[i]][1], roots, rs_len)) {
         my_cpy(roots[rs_len], edges[founds[i]][1]);
         rs_len++;
       }
       remove_edge(edges[founds[i]]);
    }
  }
  fs_len = 0;
  for(i = 0;i<es_len;i++) {
    if(!not_in(edges[i][1], roots, rs_len)) {
      founds[fs_len++] = i;
      if(not_in(edges[i][0], nodes, ns_len)) {
        my_cpy(nodes[ns_len],edges[i][0]);
        ns_len++;
      }
    }
  }
  for(i = 0;i < fs_len;i++) remove_edge(edges[founds[i]]);
  ce_len = 0;
  while(1) {
    flag = 0;
    for(i = 0;i < es_len;i++) {
       if((!equal(edges[i][0], edges[i][1])) && (not_in(edges[i][0], cycle, ce_len)) && (not_in(edges[i][1], cycle, ce_len))) {
         my_cpy(perent, edges[i][1]);
         l = init(trajects[ts_len], edges[i][0], perent);
         my_cpy(cycle[ce_len], edges[i][0]);
         ce_len++;
         my_cpy(cycle[ce_len], perent);
         ce_len++;
         fs_len = 0;
         founds[fs_len++] = i;
         flag = 1;
         break;
       }
    }
    if(!flag) break;
    while(1) {
      flag = 0;
      for(i = 0;i < es_len;i++) {
        if((equal(perent,edges[i][0])) && (!equal(edges[i][0],edges[i][1])) && (not_in(edges[i][1], cycle, ce_len))) {
          my_cpy(perent, edges[i][1]);
          k = inc_traject(trajects[ts_len], perent, l);
          l = k;
          my_cpy(cycle[ce_len], perent);
          ce_len++;
          founds[fs_len++] = i;
          flag = 1;
          break;
        }
      }
    if(!flag) break;
    }
    sorted[ts_len] = ts_len;
    lens[ts_len++] = l;
    for(i = 0;i < fs_len;i++) remove_edge(edges[founds[i]]);
  }
  rs_len = 0;
  for(i = 0;i < es_len;i++) {
    if(!equal(edges[i][0], edges[i][1])) {
      if(not_in(edges[i][0], roots, rs_len)) {
        my_cpy(roots[rs_len], edges[i][0]);
        rs_len++;
      }
      if(not_in(edges[i][1], roots, rs_len)) {
        my_cpy(roots[rs_len], edges[i][1]);
        rs_len++;
      }
    }
  }
  for(i = 0;i < ce_len;i++) {
    if(!not_in(cycle[i], roots, rs_len)) remove_elem(cycle[i], roots, rs_len);
  }
  for(i = 0;i < ns_len;i++) {
    if(not_in(nodes[i], roots, rs_len)) {
        my_cpy(roots[rs_len],nodes[i]);
        rs_len++;
      }
  }
  ns_len = 0;
  for(i = 0;i < rs_len;i++) {
    if(roots[i][0] != '\0') {
      my_cpy(nodes[ns_len],roots[i]);
      ns_len++;
    }
  }
  char** node = (char **)calloc(ns_len, 4);
  for(i = 0; i < ns_len;i++) node[i] = (char *)calloc(15, 4);
  size_t* n_lens = (size_t *)calloc(ns_len, 4);
  for(i = 0;i < ns_len;i++) n_lens[i] = init_single(node[i],nodes[i]);
  sort(sorted, lens, ts_len);
  CURLcode result;
  CURL *curl;
  curl = curl_easy_init();
  curl_easy_setopt(curl, CURLOPT_URL, post_url[*p]);
  for(i = 0; i < ts_len;i++) {
    curl_easy_setopt(curl, CURLOPT_POSTFIELDSIZE, lens[i]);
    curl_easy_setopt(curl, CURLOPT_POSTFIELDS, trajects[sorted[i]]);
    result = curl_easy_perform(curl);
  }
  for(i = 0; i < ns_len;i++) {
    curl_easy_setopt(curl, CURLOPT_POSTFIELDSIZE, n_lens[i]);
    curl_easy_setopt(curl, CURLOPT_POSTFIELDS, node[i]);
    result = curl_easy_perform(curl);
  }
  curl_easy_cleanup(curl);
  curl_global_cleanup();
  free(get_rs[*p].memory);
  free(get_es[*p].memory);
  free(lens);
  free(sorted);
  for(i = 0;i<1000;i++) {
    free(roots[i]);
    free(cycle[i]);
    free(nodes[i]);
  }
  for(i = 0;i<2000;i++) {
     free(edges[i][0]); 
     free(edges[i][1]);
     free(edges[i]);
  }
  for(i = 0;i<800;i++) free(trajects[i]); 
  return NULL;
}

int main(void) {
  curl_global_init(CURL_GLOBAL_ALL);
  CURL* curl_handle;
  CURLcode res;
  curl_handle = curl_easy_init();
  pthread_t ids[10]; 
  char* get_url1[10] = {"http://172.16.24.129:8080/api/sector/1/objects", 
  "http://172.16.24.129:8080/api/sector/2/objects",
  "http://172.16.24.129:8080/api/sector/3/objects",
  "http://172.16.24.129:8080/api/sector/4/objects",
  "http://172.16.24.129:8080/api/sector/5/objects",
  "http://172.16.24.129:8080/api/sector/6/objects",
  "http://172.16.24.129:8080/api/sector/7/objects",
  "http://172.16.24.129:8080/api/sector/8/objects",
  "http://172.16.24.129:8080/api/sector/9/objects",
  "http://172.16.24.129:8080/api/sector/10/objects"};
  char* get_url2[10] = {"http://172.16.24.129:8080/api/sector/1/roots", 
  "http://172.16.24.129:8080/api/sector/2/roots",
  "http://172.16.24.129:8080/api/sector/3/roots",
  "http://172.16.24.129:8080/api/sector/4/roots",
  "http://172.16.24.129:8080/api/sector/5/roots",
  "http://172.16.24.129:8080/api/sector/6/roots",
  "http://172.16.24.129:8080/api/sector/7/roots",
  "http://172.16.24.129:8080/api/sector/8/roots",
  "http://172.16.24.129:8080/api/sector/9/roots",
  "http://172.16.24.129:8080/api/sector/10/roots"};
  size_t i;
  size_t index[10];
  for(i = 0;i < 10;i++) {
    get_es[i].memory = (char*)malloc(1);  
    get_es[i].size = 0; 
    get_rs[i].memory = (char*)malloc(1);  
    get_rs[i].size = 0; 
    if(i == 0) {
      curl_easy_setopt(curl_handle, CURLOPT_TIMEOUT, 10L);
      curl_easy_setopt(curl_handle, CURLOPT_URL, get_url1[0]);
      curl_easy_setopt(curl_handle, CURLOPT_WRITEFUNCTION, WriteMemoryCallback);
      curl_easy_setopt(curl_handle, CURLOPT_WRITEDATA, (void *)&(get_es[0]));
      res = curl_easy_perform(curl_handle);
      curl_easy_setopt(curl_handle, CURLOPT_TIMEOUT, 0);
      while(res == 28) { res = curl_easy_perform(curl_handle); }
    } else {
      curl_easy_setopt(curl_handle, CURLOPT_URL, get_url1[i]);
      curl_easy_setopt(curl_handle, CURLOPT_WRITEDATA, (void *)&(get_es[i]));
      res = curl_easy_perform(curl_handle);
    }
    curl_easy_setopt(curl_handle, CURLOPT_URL, get_url2[i]);
    curl_easy_setopt(curl_handle, CURLOPT_WRITEDATA, (void *)&(get_rs[i]));
    res = curl_easy_perform(curl_handle);
    index[i] = i;
    pthread_create(&ids[i], NULL, thread, (void *)&(index[i]));
  }
  for(i = 0; i < 10; i++) pthread_join(ids[i], NULL);
  curl_easy_cleanup(curl_handle);
  curl_global_cleanup();
  return 0;
}